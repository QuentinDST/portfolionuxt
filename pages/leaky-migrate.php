<?php


/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.bm-services.com/
 * @since             1.0.0
 * @package           Leaky_Migrate
 *
 * @wordpress-plugin
 * Plugin Name:       Leaky Migrate
 * Plugin URI:        https://www.bm-services.com/
 * Description:       plugin to migrate data from leaky to memberpress
 * Version:           1.0.0
 * Author:            Quentin
 * Author URI:        https://www.bm-services.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       leaky-migrate
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('LEAKY_MIGRATE_VERSION', '1.0.0');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-leaky-migrate-activator.php
 */
function activate_leaky_migrate()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-leaky-migrate-activator.php';
    Leaky_Migrate_Activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-leaky-migrate-deactivator.php
 */
function deactivate_leaky_migrate()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-leaky-migrate-deactivator.php';
    Leaky_Migrate_Deactivator::deactivate();
}


register_activation_hook(__FILE__, 'activate_leaky_migrate');
register_deactivation_hook(__FILE__, 'deactivate_leaky_migrate');


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-leaky-migrate.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_leaky_migrate()
{


    $plugin = new Leaky_Migrate();
    $plugin->run();
}
run_leaky_migrate();


// Create LeakyMigrate BO


function leaky_migrate_menu()
{
    add_menu_page(
        'Leaky Migrate',
        'Leaky Migrate',
        'manage_options',
        'leaky-migrate',
        'leaky_migrate_admin_page',
        'dashicons-migrate'
    );
}
add_action('admin_menu', 'leaky_migrate_menu');




function leaky_migrate_admin_page()
{
?>
    <div class="wrap">
        <h1>Leaky Migrate to MemberPress</h1>
        <p>Migrer tous vos anciens abonnés</p>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="csv_file" accept=".csv">
            <input type="submit" name="submit" value="Importer fichier">
        </form>
    </div>
<?php
}
add_action('wp-head', 'leaky_migrate');




function leaky_migrate_form()
{
    if (isset($_POST['submit']) && !empty($_FILES['csv_file']['tmp_name'])) {
        require_once plugin_dir_path(__FILE__) . 'includes/class-csv-importer.php';


        $csv_file = $_FILES['csv_file']['tmp_name'];
        $csv_importer = new CSV_Importer();
        $csv_data = $csv_importer->import($csv_file);


        if ($csv_data) {
            insert_memberpress_csv($csv_data);
            add_settings_error('leaky_migrate_messages', 'leaky_migrate_success', 'Fichier importé avec succès !', 'updated');
        } else {


            add_settings_error('leaky_migrate_messages', 'leaky_migrate_error', 'Erreur lors de l\'importation du fichier.', 'error');
        }


        settings_errors('leaky_migrate_messages');
    }
}


add_action('admin_init', 'leaky_migrate_form');


function insert_memberpress_csv($csv_data)
{


    global $wpdb;
    $members_table = $wpdb->prefix . 'mepr_members';
    $transaction_table = $wpdb->prefix . 'mepr_transactions';
    $subscription_table = $wpdb->prefix . 'mepr_subscriptions';


    foreach ($csv_data as $row) {
        $user_id = $row['user_id'];
        $price = $row['price'];
        $created = $row['created'];
        $expires = $row['expires'];


        $id_membership = null;
        if ($price == 88) {
            $id_membership = 9;
            //19414
        } elseif ($price == 44) {
            $id_membership = 10;
            //18433
        } elseif ($price == 22) {
            $id_membership = 11;
            //18436
        }


        $duration = 0;
        if ($price == 88) {
            $duration = 12; // 12 mois
        } elseif ($price == 44) {
            $duration = 6; // 6 mois
        } elseif ($price == 22) {
            $duration = 3; // 3 mois
        }


        $createdTimestamp = strtotime($created);
        $expires = date('Y-m-d H:i:s', strtotime("+$duration months", $createdTimestamp));
        $expiresTimestamp = strtotime($expires);
        $status = ($expiresTimestamp > current_time('timestamp')) ? MeprSubscription::$active_str : MeprSubscription::$cancelled_str;




        if ($id_membership) {


            // Récup valeur access_condition


            $access_condition_value = $wpdb->prepare("SELECT access_condition FROM wp_mepr_rule_access_conditions WHERE id = %d", $id_membership);
            $access_condition = $wpdb->get_var($access_condition_value);




            // table wp_mepr_transaction
            $wpdb->insert(
                $transaction_table,
                array(
                    'amount' => $price,
                    'total' => $price,
                    'tax_shipping' => $price,
                    'user_id' => $user_id,
                    'product_id' => $access_condition,
                    'coupon_id' => 0,
                    'status' => 'complete',
                    'subscription_id' => 0,
                    'created_at' => $created,
                    'expires_at' => $expires,
                ),
                array(
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%s',
                    '%d',
                    '%s',
                    '%s',
                ),
            );
            $transaction_id = $wpdb->insert_id; // Récupére deriner id


            // table wp-mepr_subscriptions
            $wpdb->insert(
                $subscription_table,
                array(
                    'user_id' => $user_id,
                    'product_id' => $access_condition,
                    'total' => $price,
                    'period' => $duration,
                    'status' => $status,
                    'created_at' => $created,
                ),


                array(
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%s',
                    '%s',
                ),
            );
        }
        // table wp_mepr_members
        if ($access_condition !== null) {
            $wpdb->update(
                $members_table,
                array(
                    'created_at' => $created,
                    'total_spent' => $price,
                    'txn_count' => 1,
                    'active_txn_count' => 1,
                    'sub_count' => 0,
                    'pending_sub_count' => 0,
                    'memberships' => $access_condition,
                    'first_txn_id' => $transaction_id,
                    'latest_txn_id' => $transaction_id,
                ),
                array('user_id' => $user_id),
                array(
                    '%s',
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%s',
                ),
                array('%d')
            );
        }
        $wpdb_error = $wpdb->last_error;
        if (!empty($wpdb_error)) {
            error_log("WPDB Error: " . $wpdb_error);
        }
    }
}

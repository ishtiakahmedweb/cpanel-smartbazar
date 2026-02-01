-- MySQL dump from SQLite
-- Generated: 2026-01-28 13:43:02

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Table: migrations
TRUNCATE TABLE `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '2018_11_06_222923_create_transactions_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '2018_11_07_192923_create_transfers_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2018_11_15_124230_create_wallets_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2020_09_05_055627_create_slides_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2020_09_05_132720_create_categories_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2020_09_05_142606_create_brands_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2020_09_05_152538_create_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2020_09_06_045904_create_category_product_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2020_09_06_072209_create_images_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('12', '2020_09_07_030004_create_image_product_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2020_09_11_075847_create_orders_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('14', '2020_09_12_141825_create_home_sections_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('15', '2020_09_12_144701_create_category_home_section_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('16', '2020_09_15_071443_create_menus_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('17', '2020_09_15_071457_create_menu_items_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('18', '2020_09_15_134905_create_pages_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('19', '2020_09_16_105031_create_admins_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('20', '2020_09_19_023502_create_password_resets_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('21', '2020_09_19_062540_create_settings_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('22', '2020_09_23_161808_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('23', '2020_12_11_120455_create_category_menus_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('24', '2021_11_02_202021_update_wallets_uuid_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('25', '2022_01_26_122948_make_email_nullable_in_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('26', '2023_05_06_225120_add_staff_column_to_admins_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('27', '2023_05_06_231420_add_admin_id_column_to_orders_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('28', '2023_05_08_190220_add_status_at_column_to_orders_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('29', '2023_12_30_113122_extra_columns_removed', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('30', '2023_12_30_204610_soft_delete', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('31', '2024_01_24_185401_add_extra_column_in_transfer', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('32', '2024_02_11_154523_create_attributes_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('33', '2024_02_11_154545_create_options_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('34', '2024_02_12_162741_add_parent_id_column_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('35', '2024_02_12_164540_create_option_product_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('36', '2024_02_16_211454_create_activity_log_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('37', '2024_02_17_230800_create_reports_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('38', '2024_02_26_115125_create_sessions_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('39', '2024_02_27_110041_add_type_column_to_orders_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('40', '2024_03_02_010050_add_products_column_to_sections_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('41', '2024_03_02_104737_add_desc_img_columns_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('42', '2024_03_21_000000_add_reseller_fields_to_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('43', '2024_03_22_141000_category_menu', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('44', '2024_04_03_155236_add_image_id_column_to_brands_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('45', '2024_04_21_153831_add_order_column_to_image_product_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('46', '2024_04_23_152416_add_wholesale_column_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('47', '2024_06_09_000000_add_uuid_to_failed_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('48', '2024_09_04_214435_add_delivery_columns_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('49', '2024_11_17_163909_add_event_column_to_activity_log_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('50', '2024_11_17_163910_add_batch_uuid_column_to_activity_log_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('51', '2024_11_18_173407_create_pulse_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('52', '2024_11_18_175450_create_telescope_entries_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('53', '2024_12_06_182847_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('54', '2024_12_19_000000_add_unique_constraints_to_pivot_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('55', '2025_01_17_170908_create_landings_page', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('56', '2025_02_13_103736_make_email_non_unique_in_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('57', '2025_02_26_094153_create_shoppingcart_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('58', '2025_02_26_114815_add_user_columns_to_shopping_cart_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('59', '2025_04_07_175950_add_resell_column_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('60', '2025_04_09_162159_add_last_order_received_at_column_to_admins_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('61', '2025_04_23_084613_make_user_a_reseller', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('62', '2025_06_11_201341_completed_to_delivered', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('63', '2025_06_13_160000_add_source_id_to_resources', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('64', '2025_07_14_121041_add_average_purchase_price_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('65', '2025_07_14_121050_create_purchases_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('66', '2025_07_14_162734_create_product_purchases_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('67', '2025_07_19_134457_create_coupons_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('68', '2025_07_19_150400_create_bkash_payments_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('69', '2025_07_19_150401_create_bkash_refunds_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('70', '2025_07_19_173658_add_shipped_at_to_orders_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('71', '2025_07_19_183734_add_is_enabled_to_brands_and_categories_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('72', '2025_08_14_095306_add_shipping_cost_fields_to_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('73', '2025_08_15_010924_add_hot_sale_new_arrival_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('74', '2025_11_16_130732_convert_invoiced_order_status_to_packaging', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('75', '2025_11_23_155235_add_performance_indexes_for_products', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('76', '2025_11_25_234226_create_leads_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('77', '2025_11_26_195554_add_district_to_leads_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('78', '2025_12_02_011337_add_short_description_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('79', '2025_12_02_011340_add_seo_fields_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('80', '2025_12_02_011359_add_seo_fields_to_categories_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('81', '2025_12_02_011402_add_seo_fields_to_brands_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('82', '2025_12_02_011403_add_seo_fields_to_home_sections_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('83', '2025_12_02_011934_add_short_description_to_products_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('84', '2025_12_02_012107_create_seo_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('85', '2025_12_02_171904_create_reviews_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('86', '2025_12_02_171905_create_ratings_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('87', '2026_01_13_000000_add_type_fields_to_coupons_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('88', '2026_01_20_231600_create_districts_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('89', '2026_01_20_231606_create_areas_table', '2');

-- Table: category_product
TRUNCATE TABLE `category_product`;
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('1', '1', '1', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('2', '3', '2', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('3', '1', '3', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('4', '3', '3', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('5', '1', '4', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('6', '1', '5', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('7', '4', '5', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('8', '1', '6', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('9', '3', '6', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('10', '1', '7', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('11', '3', '7', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('12', '4', '8', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('13', '5', '8', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('15', '6', '9', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('16', '4', '10', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('17', '5', '10', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('18', '1', '11', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('19', '3', '11', NULL, NULL);
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES ('20', '4', '11', NULL, NULL);

-- Table: images
TRUNCATE TABLE `images`;
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('1', 'nonstick cooker.png', 'public', '/storage/19-Jan-2026/images/1768846928-nonstick-cooker.png', 'png', 'image/png', '49661', '2026-01-19 18:22:08', '2026-01-19 18:22:08', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('2', '1764496277-drain-cleaner-powder-sink-drain-pipes-toilet-blockage-cleaner-drainizer-drainizer-buy-1-get-1-free-zaavio-37559857250474.jpg', 'public', '/storage/23-Jan-2026/images/1769182123-1764496277-drain-cleaner-powder-sink-drain-pipes-toilet-blockage-cleaner-drainizer-drainizer-buy-1-get-1-free-zaavio-37559857250474.jpg', 'jpg', 'image/jpeg', '72179', '2026-01-23 15:28:44', '2026-01-23 15:28:44', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('3', '1764496370-f98b5b3a711f70f9679205e38b182e76.jpg', 'public', '/storage/23-Jan-2026/images/1769182153-1764496370-f98b5b3a711f70f9679205e38b182e76.jpg', 'jpg', 'image/jpeg', '53932', '2026-01-23 15:29:13', '2026-01-23 15:29:13', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('4', '1764496330-61SRxjlaRSL._AC_UF1000,1000_QL80_.jpg', 'public', '/storage/23-Jan-2026/images/1769182155-1764496330-61SRxjlaRSL._AC_UF1000,1000_QL80_.jpg', 'jpg', 'image/jpeg', '51610', '2026-01-23 15:29:15', '2026-01-23 15:29:15', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('5', '1764496377-71GtUrOB4HL.jpg', 'public', '/storage/23-Jan-2026/images/1769182161-1764496377-71GtUrOB4HL.jpg', 'jpg', 'image/jpeg', '57303', '2026-01-23 15:29:21', '2026-01-23 15:29:21', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('6', '1764496389-1079699_wild-tornado-sink-drain-cleaner-value-pack.jpeg', 'public', '/storage/23-Jan-2026/images/1769182166-1764496389-1079699_wild-tornado-sink-drain-cleaner-value-pack.jpeg', 'jpg', 'image/jpeg', '76014', '2026-01-23 15:29:26', '2026-01-23 15:29:26', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('7', '1764496393-s-l1200.jpg', 'public', '/storage/23-Jan-2026/images/1769182168-1764496393-s-l1200.jpg', 'jpg', 'image/jpeg', '75525', '2026-01-23 15:29:29', '2026-01-23 15:29:29', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('8', '1665023505-1634038762-Kitchen-Cleaner.jpg', 'public', '/storage/23-Jan-2026/images/1769182707-1665023505-1634038762-Kitchen-Cleaner.jpg', 'jpg', 'image/jpeg', '20044', '2026-01-23 15:38:27', '2026-01-23 15:38:27', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('9', '1665023503-1634038762-Kitchen-Cleaner1.jpg', 'public', '/storage/23-Jan-2026/images/1769182709-1665023503-1634038762-Kitchen-Cleaner1.jpg', 'jpg', 'image/jpeg', '48918', '2026-01-23 15:38:29', '2026-01-23 15:38:29', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('10', '1665023508-1634039083-Kitchen-Cleaner2.jpg', 'public', '/storage/23-Jan-2026/images/1769182713-1665023508-1634039083-Kitchen-Cleaner2.jpg', 'jpg', 'image/jpeg', '51413', '2026-01-23 15:38:34', '2026-01-23 15:38:34', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('11', '1665023511-1634039083-Kitchen-Cleaner3.jpg', 'public', '/storage/23-Jan-2026/images/1769182718-1665023511-1634039083-Kitchen-Cleaner3.jpg', 'jpg', 'image/jpeg', '54154', '2026-01-23 15:38:38', '2026-01-23 15:38:38', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('12', '1768642778-WhatsApp-Image-2026-01-12-at-2.24.04-PM-(2).jpeg', 'public', '/storage/23-Jan-2026/images/1769183105-1768642778-WhatsApp-Image-2026-01-12-at-2.24.04-PM-(2).jpeg', 'jpg', 'image/jpeg', '50159', '2026-01-23 15:45:05', '2026-01-23 15:45:05', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('13', '1768642778-WhatsApp-Image-2026-01-12-at-2.24.04-PM-(3).jpeg', 'public', '/storage/23-Jan-2026/images/1769183109-1768642778-WhatsApp-Image-2026-01-12-at-2.24.04-PM-(3).jpeg', 'jpg', 'image/jpeg', '49390', '2026-01-23 15:45:09', '2026-01-23 15:45:09', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('14', '1768642751-Jhuri-1.png', 'public', '/storage/23-Jan-2026/images/1769183111-1768642751-Jhuri-1.png', 'png', 'image/png', '701489', '2026-01-23 15:45:12', '2026-01-23 15:45:12', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('15', '1768642779-WhatsApp-Image-2026-01-12-at-2.24.04-PM.jpeg', 'public', '/storage/23-Jan-2026/images/1769183118-1768642779-WhatsApp-Image-2026-01-12-at-2.24.04-PM.jpeg', 'jpg', 'image/jpeg', '77266', '2026-01-23 15:45:18', '2026-01-23 15:45:18', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('16', '1768642800-WhatsApp-Image-2026-01-12-at-5.27.36-PM-(1).jpeg', 'public', '/storage/23-Jan-2026/images/1769183120-1768642800-WhatsApp-Image-2026-01-12-at-5.27.36-PM-(1).jpeg', 'jpg', 'image/jpeg', '59157', '2026-01-23 15:45:20', '2026-01-23 15:45:20', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('17', '1768642805-WhatsApp-Image-2026-01-12-at-6.08.25-PM.jpeg', 'public', '/storage/23-Jan-2026/images/1769183125-1768642805-WhatsApp-Image-2026-01-12-at-6.08.25-PM.jpeg', 'jpg', 'image/jpeg', '99522', '2026-01-23 15:45:25', '2026-01-23 15:45:25', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('18', '1761295991-Tono-1.jpg', 'public', '/storage/23-Jan-2026/images/1769184225-1761295991-Tono-1.jpg', 'jpg', 'image/jpeg', '46870', '2026-01-23 16:03:45', '2026-01-23 16:03:45', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('19', '1761295971-TONO-HIM-Lubricant-3.jpg', 'public', '/storage/23-Jan-2026/images/1769184228-1761295971-TONO-HIM-Lubricant-3.jpg', 'jpg', 'image/jpeg', '70341', '2026-01-23 16:03:48', '2026-01-23 16:03:48', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('20', '1761296016-WhatsApp-Image-2025-07-07-at-9.55.06-PM-450x450.webp', 'public', '/storage/23-Jan-2026/images/1769184230-1761296016-WhatsApp-Image-2025-07-07-at-9.55.06-PM-450x450.webp', 'webp', 'image/webp', '22534', '2026-01-23 16:03:50', '2026-01-23 16:03:50', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('21', '1706188360-325441592_777859106994502_5940995165151306771_n.jpg', 'public', '/storage/23-Jan-2026/images/1769185305-1706188360-325441592_777859106994502_5940995165151306771_n.jpg', 'jpg', 'image/jpeg', '27064', '2026-01-23 16:21:45', '2026-01-23 16:21:45', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('22', '1706188385-325460982_8705442082831178_7429200736235230193_n (1).jpg', 'public', '/storage/23-Jan-2026/images/1769185307-1706188385-325460982_8705442082831178_7429200736235230193_n-(1).jpg', 'jpg', 'image/jpeg', '30592', '2026-01-23 16:21:47', '2026-01-23 16:21:47', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('23', '1706188385-325652018_1298618060985061_9012713595631290437_n.jpg', 'public', '/storage/23-Jan-2026/images/1769185310-1706188385-325652018_1298618060985061_9012713595631290437_n.jpg', 'jpg', 'image/jpeg', '35525', '2026-01-23 16:21:50', '2026-01-23 16:21:50', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('24', '1706188385-325755805_559766546037053_165501274930314624_n.jpg', 'public', '/storage/23-Jan-2026/images/1769185311-1706188385-325755805_559766546037053_165501274930314624_n.jpg', 'jpg', 'image/jpeg', '27816', '2026-01-23 16:21:51', '2026-01-23 16:21:51', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('25', '1706188385-325760071_1163991637622998_3451921908241820581_n.jpg', 'public', '/storage/23-Jan-2026/images/1769185315-1706188385-325760071_1163991637622998_3451921908241820581_n.jpg', 'jpg', 'image/jpeg', '15134', '2026-01-23 16:21:56', '2026-01-23 16:21:56', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('26', '1723715510-WhatsApp_Image_2024-03-06_at_10.32.32_(1).jpeg', 'public', '/storage/23-Jan-2026/images/1769185624-1723715510-WhatsApp_Image_2024-03-06_at_10.32.32_(1).jpeg', 'jpg', 'image/jpeg', '63469', '2026-01-23 16:27:04', '2026-01-23 16:27:04', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('27', '1723715510-WhatsApp_Image_2024-03-06_at_10.32.32_(2).jpeg', 'public', '/storage/23-Jan-2026/images/1769185628-1723715510-WhatsApp_Image_2024-03-06_at_10.32.32_(2).jpeg', 'jpg', 'image/jpeg', '34507', '2026-01-23 16:27:08', '2026-01-23 16:27:08', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('28', '1723715510-WhatsApp_Image_2024-03-06_at_10.32.33.jpeg', 'public', '/storage/23-Jan-2026/images/1769185631-1723715510-WhatsApp_Image_2024-03-06_at_10.32.33.jpeg', 'jpg', 'image/jpeg', '51607', '2026-01-23 16:27:11', '2026-01-23 16:27:11', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('29', '1723715510-WhatsApp_Image_2024-03-06_at_10.32.34.jpeg', 'public', '/storage/23-Jan-2026/images/1769185635-1723715510-WhatsApp_Image_2024-03-06_at_10.32.34.jpeg', 'jpg', 'image/jpeg', '41402', '2026-01-23 16:27:15', '2026-01-23 16:27:15', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('30', '1723715511-WhatsApp_Image_2024-03-06_at_10.32.34_(1).jpeg', 'public', '/storage/23-Jan-2026/images/1769185637-1723715511-WhatsApp_Image_2024-03-06_at_10.32.34_(1).jpeg', 'jpg', 'image/jpeg', '76735', '2026-01-23 16:27:17', '2026-01-23 16:27:17', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('31', '1724390763-1723902955-Posture-Corrector19-min.jpg', 'public', '/storage/23-Jan-2026/images/1769186469-1724390763-1723902955-Posture-Corrector19-min.jpg', 'jpg', 'image/jpeg', '22931', '2026-01-23 16:41:09', '2026-01-23 16:41:09', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('32', '1724390766-1723902959-61-zqxlXiiL._AC_UF894,1000_QL80_-(1).jpg', 'public', '/storage/23-Jan-2026/images/1769186475-1724390766-1723902959-61-zqxlXiiL._AC_UF894,1000_QL80_-(1).jpg', 'jpg', 'image/jpeg', '29609', '2026-01-23 16:41:16', '2026-01-23 16:41:16', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('33', '1724390755-1723902860-b3cceedf15bde8d4e73776585dd0db6e.png', 'public', '/storage/23-Jan-2026/images/1769186482-1724390755-1723902860-b3cceedf15bde8d4e73776585dd0db6e.png', 'png', 'image/png', '320537', '2026-01-23 16:41:22', '2026-01-23 16:41:22', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('34', '1760089705-baby-reading-table-with-alphabet_1706433131_4128.webp', 'public', '/storage/23-Jan-2026/images/1769186824-1760089705-baby-reading-table-with-alphabet_1706433131_4128.webp', 'webp', 'image/webp', '48250', '2026-01-23 16:47:04', '2026-01-23 16:47:04', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('35', '1760089716-032bb22eeb975694cef41fad14b65b25.jpg', 'public', '/storage/23-Jan-2026/images/1769186826-1760089716-032bb22eeb975694cef41fad14b65b25.jpg', 'jpg', 'image/jpeg', '80072', '2026-01-23 16:47:06', '2026-01-23 16:47:06', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('36', '61fszD4upCL._AC_UF1000,1000_QL80_.jpg', 'public', '/storage/23-Jan-2026/images/1769187115-61fszD4upCL._AC_UF1000,1000_QL80_.jpg', 'jpg', 'image/jpeg', '85761', '2026-01-23 16:51:55', '2026-01-23 16:51:55', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('37', '79167fa480e5979f73d4f9c7108bb857.jpg', 'public', '/storage/23-Jan-2026/images/1769187117-79167fa480e5979f73d4f9c7108bb857.jpg', 'jpg', 'image/jpeg', '444056', '2026-01-23 16:51:57', '2026-01-23 16:51:57', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('38', 'image_2a54b916-e40c-4cbb-b3ba-1d1a4f84f40a.webp', 'public', '/storage/23-Jan-2026/images/1769187120-image_2a54b916-e40c-4cbb-b3ba-1d1a4f84f40a.webp', 'webp', 'image/webp', '61570', '2026-01-23 16:52:00', '2026-01-23 16:52:00', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('39', '70245138107559dec2a7ed9e5698647b.jpg', 'public', '/storage/23-Jan-2026/images/1769187122-70245138107559dec2a7ed9e5698647b.jpg', 'jpg', 'image/jpeg', '104232', '2026-01-23 16:52:02', '2026-01-23 16:52:02', NULL);
INSERT INTO `images` (`id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`, `source_id`) VALUES ('40', '1753877583-1753514447-WhatsApp-Image-2025-07-24-at-16.09.58_4d79aa3c.jpg', 'public', '/storage/23-Jan-2026/images/1769188355-1753877583-1753514447-WhatsApp-Image-2025-07-24-at-16.09.58_4d79aa3c.jpg', 'jpg', 'image/jpeg', '85766', '2026-01-23 17:12:35', '2026-01-23 17:12:35', NULL);

-- Table: image_product
TRUNCATE TABLE `image_product`;
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('1', '1', '1', 'base', '2026-01-19 19:24:21', '2026-01-19 23:48:08', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('2', '2', '2', 'base', '2026-01-23 15:31:00', '2026-01-23 15:31:00', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('3', '7', '2', 'additional', '2026-01-23 15:31:00', '2026-01-23 15:31:00', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('4', '6', '2', 'additional', '2026-01-23 15:31:00', '2026-01-23 15:31:00', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('5', '5', '2', 'additional', '2026-01-23 15:31:00', '2026-01-23 15:31:00', '3');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('6', '4', '2', 'additional', '2026-01-23 15:31:00', '2026-01-23 15:31:00', '4');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('7', '3', '2', 'additional', '2026-01-23 15:31:00', '2026-01-23 15:31:00', '5');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('8', '11', '3', 'base', '2026-01-23 15:39:23', '2026-01-23 15:39:23', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('9', '10', '3', 'additional', '2026-01-23 15:39:23', '2026-01-23 15:39:23', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('10', '9', '3', 'additional', '2026-01-23 15:39:24', '2026-01-23 15:39:24', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('11', '8', '3', 'additional', '2026-01-23 15:39:24', '2026-01-23 15:39:24', '3');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('12', '16', '4', 'base', '2026-01-23 15:48:35', '2026-01-23 15:48:35', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('13', '17', '4', 'additional', '2026-01-23 15:48:35', '2026-01-23 15:48:35', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('14', '15', '4', 'additional', '2026-01-23 15:48:35', '2026-01-23 15:48:35', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('15', '14', '4', 'additional', '2026-01-23 15:48:35', '2026-01-23 15:48:35', '3');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('16', '12', '4', 'additional', '2026-01-23 15:48:35', '2026-01-23 15:48:35', '4');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('17', '13', '4', 'additional', '2026-01-23 15:48:36', '2026-01-23 15:48:36', '5');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('18', '19', '5', 'base', '2026-01-23 16:05:09', '2026-01-23 16:05:09', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('19', '20', '5', 'additional', '2026-01-23 16:05:09', '2026-01-23 16:05:09', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('20', '18', '5', 'additional', '2026-01-23 16:05:09', '2026-01-23 16:05:09', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('21', '21', '6', 'base', '2026-01-23 16:22:46', '2026-01-23 16:22:46', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('22', '25', '6', 'additional', '2026-01-23 16:22:46', '2026-01-23 16:22:46', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('23', '24', '6', 'additional', '2026-01-23 16:22:46', '2026-01-23 16:22:46', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('24', '23', '6', 'additional', '2026-01-23 16:22:47', '2026-01-23 16:22:47', '3');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('25', '22', '6', 'additional', '2026-01-23 16:22:47', '2026-01-23 16:22:47', '4');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('26', '28', '7', 'base', '2026-01-23 16:28:20', '2026-01-23 16:28:20', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('27', '30', '7', 'additional', '2026-01-23 16:28:20', '2026-01-23 16:28:20', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('28', '29', '7', 'additional', '2026-01-23 16:28:20', '2026-01-23 16:28:20', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('29', '27', '7', 'additional', '2026-01-23 16:28:20', '2026-01-23 16:28:20', '3');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('30', '26', '7', 'additional', '2026-01-23 16:28:20', '2026-01-23 16:28:20', '4');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('31', '33', '8', 'base', '2026-01-23 16:42:45', '2026-01-23 16:42:45', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('32', '32', '8', 'additional', '2026-01-23 16:42:45', '2026-01-23 16:42:45', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('33', '31', '8', 'additional', '2026-01-23 16:42:46', '2026-01-23 16:42:46', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('34', '35', '9', 'base', '2026-01-23 16:47:44', '2026-01-23 16:48:05', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('35', '39', '10', 'base', '2026-01-23 16:52:43', '2026-01-23 16:52:43', '0');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('36', '38', '10', 'additional', '2026-01-23 16:52:43', '2026-01-23 16:52:43', '1');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('37', '37', '10', 'additional', '2026-01-23 16:52:43', '2026-01-23 16:52:43', '2');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('38', '36', '10', 'additional', '2026-01-23 16:52:43', '2026-01-23 16:52:43', '3');
INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `img_type`, `created_at`, `updated_at`, `order`) VALUES ('39', '40', '11', 'base', '2026-01-23 17:13:12', '2026-01-23 17:13:12', '0');

-- Table: home_sections
TRUNCATE TABLE `home_sections`;
INSERT INTO `home_sections` (`id`, `title`, `type`, `order`, `data`, `created_at`, `updated_at`, `items`) VALUES ('1', 'Hot Selling!', 'carousel-grid', '1', '{\"rows\":\"1\",\"cols\":\"5\",\"source\":\"specific\"}', '2026-01-19 19:29:01', '2026-01-24 13:02:45', '[\"1\"]');

-- Table: category_home_section
TRUNCATE TABLE `category_home_section`;
INSERT INTO `category_home_section` (`id`, `category_id`, `home_section_id`, `created_at`, `updated_at`) VALUES ('1', '1', '1', NULL, NULL);

-- Table: admins
TRUNCATE TABLE `admins`;
INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `is_active`, `last_order_received_at`) VALUES ('1', 'Emon', 'admin@smartbazaar.com', NULL, '$2y$12$TtRlQGlOZ2MU3Y3XcPsBVe3lDEwlm2hvBR5F9VN9URIPU0CZO22be', '8E0IUPDLjoisSiqoM8HENWK1h5ejCzBqNJImLw9emGdWAcuESu7W7YIu3szW', '2026-01-18 23:13:34', '2026-01-22 10:19:46', '0', '1', '2026-01-22 10:19:46');

-- Table: settings
TRUNCATE TABLE `settings`;
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('1', 'company', '{\"name\":\"Smart Bazar BD\",\"contact_name\":\"+8801339387279\",\"email\":\"admin@smartbazaarbd.xyz\",\"phone\":\"+8801339387279\",\"whatsapp\":\"+8801339387279\",\"tagline\":\"Upgrade Your Life!\",\"address\":\"Mirpur, Dhaka, Bangladesh.\",\"office_time\":\"Everyday\",\"messenger\":\"https:\\/\\/m.me\\/\",\"gmap_ecode\":null,\"dev_name\":null,\"dev_link\":null}', '2026-01-19 18:03:40', '2026-01-19 18:03:40');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('2', 'call_for_order', '\"+8801339387279\"', '2026-01-19 18:03:41', '2026-01-19 18:03:41');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('3', 'social', '{\"facebook\":{\"link\":null},\"twitter\":{\"link\":null},\"instagram\":{\"link\":null},\"youtube\":{\"link\":null}}', '2026-01-19 18:03:41', '2026-01-19 18:03:41');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('4', 'logo', '{\"desktop\":\"\\/storage\\/19-Jan-2026\\/logo\\/1768845845-logopn.png\",\"mobile\":\"\\/storage\\/19-Jan-2026\\/logo\\/1768845845-logopn.png\",\"login\":\"\\/storage\\/19-Jan-2026\\/logo\\/1768845845-logopn.png\",\"favicon\":\"\\/storage\\/19-Jan-2026\\/logo\\/1768845845-fav.png\"}', '2026-01-19 18:04:06', '2026-01-19 18:04:06');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('5', 'delivery_charge', '{\"inside_dhaka\":\"80\",\"outside_dhaka\":\"130\"}', '2026-01-19 18:05:35', '2026-01-19 18:10:16');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('6', 'delivery_text', 'null', '2026-01-19 18:10:17', '2026-01-19 18:10:17');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('7', 'free_delivery', '{\"enabled\":\"0\",\"for_all\":\"0\",\"min_quantity\":\"1\",\"min_amount\":\"1\"}', '2026-01-19 18:10:17', '2026-01-19 19:27:48');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('8', 'default_area', '{\"inside\":\"0\",\"outside\":\"0\"}', '2026-01-19 18:10:18', '2026-01-20 02:35:58');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('9', 'show_option', '{\"productwise_delivery_charge\":\"1\",\"quantitywise_delivery_charge\":\"0\",\"customer_login\":\"1\",\"category_dropdown\":\"1\",\"category_carousel\":\"0\",\"product_grid_button\":\"order_now\",\"add_to_cart_text\":\"Add to Cart\",\"add_to_cart_icon\":\"<i class=\\\"fas fa-cart-plus\\\"><\\/i>\",\"order_now_text\":\"Order Now\",\"order_now_icon\":\"<i class=\\\"fas fa-shopping-bag\\\"><\\/i>\",\"guest_can_see_price\":\"1\",\"checkout_button_text\":\"Confirm Order\",\"product_sort\":\"random\",\"checkout_template\":\"simple\",\"product_detail_buttons_inline\":\"on\",\"product_detail_add_to_cart\":\"1\",\"product_detail_order_now\":\"1\",\"invoices_per_page\":\"3\",\"invoice_prefix\":null,\"topbar_phone\":\"0\",\"track_order\":\"0\",\"hide_phone_prefix\":\"0\",\"hide_checkout_note\":\"0\",\"hide_invoice_image\":\"0\",\"show_others_orders\":\"0\"}', '2026-01-19 18:10:18', '2026-01-20 03:08:09');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('10', 'products_page', '{\"rows\":\"3\",\"cols\":\"5\"}', '2026-01-19 23:47:07', '2026-01-19 23:47:07');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('11', 'related_products', '{\"rows\":\"1\",\"cols\":\"5\"}', '2026-01-19 23:47:08', '2026-01-19 23:47:08');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('12', 'scroll_text', 'null', '2026-01-19 23:47:08', '2026-01-19 23:47:08');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('13', 'discount_text', 'null', '2026-01-19 23:47:09', '2026-01-19 23:47:09');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('14', 'services', '{\"enabled\":\"0\",\"one\":{\"title\":null,\"detail\":null},\"two\":{\"title\":null,\"detail\":null},\"three\":{\"title\":null,\"detail\":null},\"four\":{\"title\":null,\"detail\":null}}', '2026-01-19 23:47:10', '2026-01-19 23:47:10');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('15', 'color', '{\"topbar\":{\"background_color\":\"#4A1B87\",\"background_hover\":\"#3A156B\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"},\"header\":{\"background_color\":\"#5B22A5\",\"background_hover\":\"#5B22A5\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"},\"search\":{\"background_color\":\"#FFFFFF\",\"background_hover\":\"#FFFFFF\",\"text_color\":\"#5B22A5\",\"text_hover\":\"#5B22A5\"},\"navbar\":{\"background_color\":\"#5B22A5\",\"background_hover\":\"#4A1B87\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"},\"category_menu\":{\"background_color\":\"#FFFFFF\",\"background_hover\":\"#F8F4FF\",\"text_color\":\"#5B22A5\",\"text_hover\":\"#4A1B87\"},\"section\":{\"background_color\":\"#FFFFFF\",\"background_hover\":\"#FFFFFF\",\"text_color\":\"#5B22A5\",\"text_hover\":\"#4A1B87\"},\"badge\":{\"background_color\":\"#5B22A5\",\"background_hover\":\"#4A1B87\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"},\"footer\":{\"background_color\":\"#5B22A5\",\"background_hover\":\"#4A1B87\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"},\"primary\":{\"background_color\":\"#5B22A5\",\"background_hover\":\"#4A1B87\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"},\"add_to_cart\":{\"background_color\":\"#FFFFFF\",\"background_hover\":\"#5B22A5\",\"text_color\":\"#5B22A5\",\"text_hover\":\"#FFFFFF\"},\"order_now\":{\"background_color\":\"#5B22A5\",\"background_hover\":\"#4A1B87\",\"text_color\":\"#FFFFFF\",\"text_hover\":\"#FFFFFF\"}}', '2026-01-19 23:51:05', '2026-01-22 10:17:54');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('16', 'Pathao', '{\"enabled\":\"0\",\"store_id\":null,\"user_selects_city_area\":\"0\",\"username\":\"admin@smartbazaar.com\",\"password\":\"@123321!\",\"client_id\":null,\"client_secret\":null}', '2026-01-20 00:52:07', '2026-01-20 02:16:45');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('17', 'fraud', '{\"allow_per_hour\":null,\"allow_per_day\":null,\"max_qty_per_product\":null}', '2026-01-20 00:52:07', '2026-01-20 02:14:08');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('18', 'SMSTemplates', '{\"otp\":\"Your OTP is: [code]\",\"confirmation\":\"Order confirmed. Order ID: [id]\"}', '2026-01-20 00:52:08', '2026-01-20 00:52:08');
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES ('19', 'SteadFast', '{\"enabled\":\"0\",\"key\":null,\"secret\":null}', '2026-01-20 02:15:46', '2026-01-20 02:15:46');

-- Table: jobs
TRUNCATE TABLE `jobs`;
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('1', 'default', '{\"uuid\":\"4faaf5fb-e09c-4438-874b-ca973ff0044e\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768850662,\"delay\":null}', '0', NULL, '1768850662', '1768850662');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('2', 'default', '{\"uuid\":\"bd4f04b0-b739-4266-b727-5843fe9fb97b\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:2:{i:0;s:6:\\\"images\\\";i:1;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768850708,\"delay\":null}', '0', NULL, '1768850708', '1768850708');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('3', 'default', '{\"uuid\":\"d8b1a446-9806-4103-b1fd-480bd5cfee5a\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:2:{i:0;s:6:\\\"images\\\";i:1;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768866488,\"delay\":null}', '0', NULL, '1768866488', '1768866488');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('4', 'default', '{\"uuid\":\"4b208709-2c35-4ccf-85ab-605310b08c01\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769182261,\"delay\":null}', '0', NULL, '1769182261', '1769182261');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('5', 'default', '{\"uuid\":\"6b5a9450-e90e-42c4-b2a6-88a42fdf41fe\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769182764,\"delay\":null}', '0', NULL, '1769182764', '1769182764');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('6', 'default', '{\"uuid\":\"4653d4ad-da48-46e1-8f35-80220fc5b58f\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769183316,\"delay\":null}', '0', NULL, '1769183316', '1769183316');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('7', 'default', '{\"uuid\":\"1c2a1367-9c5d-4739-9128-17a5fb4d2642\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769184310,\"delay\":null}', '0', NULL, '1769184310', '1769184310');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('8', 'default', '{\"uuid\":\"686f33d0-35e1-4f08-913f-8e41e686fea8\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769185367,\"delay\":null}', '0', NULL, '1769185367', '1769185367');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('9', 'default', '{\"uuid\":\"8079131b-d5c8-44cf-aa14-b4f2dd8deb96\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769185701,\"delay\":null}', '0', NULL, '1769185701', '1769185701');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('10', 'default', '{\"uuid\":\"c004f43f-5592-456b-aef9-504894193acc\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769186566,\"delay\":null}', '0', NULL, '1769186566', '1769186566');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('11', 'default', '{\"uuid\":\"8cb89df5-98fd-443e-b253-5e51a7e8ad2a\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769186865,\"delay\":null}', '0', NULL, '1769186865', '1769186865');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('12', 'default', '{\"uuid\":\"9f4f45b2-b0a0-48d0-871e-5f73a947487e\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:2:{i:0;s:6:\\\"images\\\";i:1;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769186885,\"delay\":null}', '0', NULL, '1769186885', '1769186885');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('13', 'default', '{\"uuid\":\"bee06692-2c80-4133-a16a-4fdb590d96ec\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769187163,\"delay\":null}', '0', NULL, '1769187163', '1769187163');
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES ('14', 'default', '{\"uuid\":\"cc131b9a-57d9-4c6a-b1dc-cbd6ba834f80\",\"displayName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"10,30,60\",\"timeout\":600,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CopyProductToResellers\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\CopyProductToResellers\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:10:\\\"categories\\\";}s:10:\\\"connection\\\";s:6:\\\"sqlite\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1769188392,\"delay\":null}', '0', NULL, '1769188392', '1769188392');

-- Table: users
TRUNCATE TABLE `users`;
INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `domain`, `order_prefix`, `is_active`, `db_host`, `db_name`, `db_username`, `db_password`, `shop_name`, `logo`, `bkash_number`, `is_verified`, `inside_dhaka_shipping`, `outside_dhaka_shipping`) VALUES ('1', 'Test User', 'test@example.com', '+1.240.292.9441', NULL, '2026-01-18 23:13:32', '$2y$12$DgKt1gxVzVXAqgSDFfpnPuD8C2tgUltL/Jk2w2/NGc9SzEOuZKi2i', 'FnjML2ZGXa', '2026-01-18 23:13:33', '2026-01-18 23:13:33', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0');
INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `domain`, `order_prefix`, `is_active`, `db_host`, `db_name`, `db_username`, `db_password`, `shop_name`, `logo`, `bkash_number`, `is_verified`, `inside_dhaka_shipping`, `outside_dhaka_shipping`) VALUES ('2', 'Admin', 'admin@smartbazaar.com', '01700000000', NULL, '2026-01-18 23:13:34', '$2y$12$RO3ksHShUcReWMBlpJC.R.7.ElfKPx0rXeD6vpaDFI6QORY56QnMu', 'tS68NJxLez', '2026-01-18 23:13:34', '2026-01-18 23:13:34', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0');
INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `domain`, `order_prefix`, `is_active`, `db_host`, `db_name`, `db_username`, `db_password`, `shop_name`, `logo`, `bkash_number`, `is_verified`, `inside_dhaka_shipping`, `outside_dhaka_shipping`) VALUES ('3', 'Test User', 'test@example.com', '+1 (843) 931-4391', NULL, '2026-01-19 17:01:09', '$2y$12$8eQjn0sRTkG/x2JVwi2Z7ulvsVC9INdcHJZbLdykTWb.qjt8vqSC2', 'o8y0G6tzvJ', '2026-01-19 17:01:09', '2026-01-19 17:01:09', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0');
INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `domain`, `order_prefix`, `is_active`, `db_host`, `db_name`, `db_username`, `db_password`, `shop_name`, `logo`, `bkash_number`, `is_verified`, `inside_dhaka_shipping`, `outside_dhaka_shipping`) VALUES ('4', 'Suriya Rahman', NULL, '+8801767934747', '8919 145th street', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2026-01-20 16:20:06', '2026-01-20 16:20:06', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0');
INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `domain`, `order_prefix`, `is_active`, `db_host`, `db_name`, `db_username`, `db_password`, `shop_name`, `logo`, `bkash_number`, `is_verified`, `inside_dhaka_shipping`, `outside_dhaka_shipping`) VALUES ('5', 'Suriya Rahman', NULL, '+8801777777777', '8919 145th street', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2026-01-22 10:19:46', '2026-01-22 10:19:46', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0');

-- Table: orders
TRUNCATE TABLE `orders`;
INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `status`, `products`, `note`, `data`, `created_at`, `updated_at`, `admin_id`, `status_at`, `type`, `source_id`, `shipped_at`) VALUES ('1', '4', 'Suriya Rahman', '+8801767934747', NULL, '8919 145th street', 'DELIVERED', '{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":1,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":1,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":999,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}}', NULL, '{\"subtotal\":\"999\",\"shipping_cost\":130,\"retail_delivery_fee\":\"260\",\"advanced\":0,\"discount\":0,\"retail_discount\":0,\"courier\":\"Other\",\"city_id\":\"\",\"area_id\":\"\",\"weight\":0.5,\"packaging_charge\":25,\"is_fraud\":false,\"is_repeat\":false,\"shipping_area\":\"Outside Dhaka\",\"coupon_discount\":0,\"coupon_id\":null,\"coupon_code\":null,\"purchase_cost\":645}', '2026-01-20 16:20:06', '2026-01-23 13:16:49', '1', '2026-01-23 13:16:49', '0', NULL, NULL);
INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `status`, `products`, `note`, `data`, `created_at`, `updated_at`, `admin_id`, `status_at`, `type`, `source_id`, `shipped_at`) VALUES ('2', '4', 'Suriya Rahman', '+8801767934747', NULL, '8919 145th street', 'CONFIRMED', '{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":2,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":1,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":999,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}}', NULL, '{\"subtotal\":\"1998\",\"shipping_cost\":130,\"retail_delivery_fee\":\"130\",\"advanced\":0,\"discount\":0,\"retail_discount\":0,\"courier\":\"Other\",\"city_id\":\"\",\"area_id\":\"\",\"weight\":0.5,\"packaging_charge\":25,\"is_fraud\":false,\"is_repeat\":true,\"shipping_area\":\"Outside Dhaka\",\"coupon_discount\":0,\"coupon_id\":null,\"coupon_code\":null,\"purchase_cost\":1290}', '2026-01-20 16:23:02', '2026-01-20 16:42:29', '1', '2026-01-20 16:42:29', '0', NULL, NULL);
INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `status`, `products`, `note`, `data`, `created_at`, `updated_at`, `admin_id`, `status_at`, `type`, `source_id`, `shipped_at`) VALUES ('3', '4', 'Suriya Rahman', '+8801767934747', NULL, '8919 145th street', 'PENDING', '{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":1,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":3,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":2997,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}}', NULL, '{\"subtotal\":\"999\",\"shipping_cost\":130,\"retail_delivery_fee\":\"130\",\"advanced\":0,\"discount\":0,\"retail_discount\":0,\"courier\":\"Other\",\"city_id\":\"\",\"area_id\":\"\",\"weight\":0.5,\"packaging_charge\":25,\"is_fraud\":true,\"is_repeat\":true,\"shipping_area\":\"Outside Dhaka\",\"coupon_discount\":0,\"coupon_id\":null,\"coupon_code\":null,\"purchase_cost\":645}', '2026-01-21 00:09:02', '2026-01-21 00:09:02', '1', '2026-01-21 00:09:02', '0', NULL, NULL);
INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `status`, `products`, `note`, `data`, `created_at`, `updated_at`, `admin_id`, `status_at`, `type`, `source_id`, `shipped_at`) VALUES ('4', '5', 'Suriya Rahman', '+8801777777777', NULL, '8919 145th street', 'PENDING', '{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":1,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":1,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":999,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}}', NULL, '{\"subtotal\":\"999\",\"shipping_cost\":130,\"retail_delivery_fee\":130,\"advanced\":0,\"discount\":0,\"retail_discount\":0,\"courier\":\"Other\",\"city_id\":\"10\",\"area_id\":\"\",\"weight\":0.5,\"packaging_charge\":25,\"is_fraud\":false,\"is_repeat\":false,\"shipping_area\":\"Outside Dhaka\",\"coupon_discount\":0,\"coupon_id\":null,\"coupon_code\":null,\"purchase_cost\":645,\"city_name\":\"Chattogram\"}', '2026-01-22 10:19:46', '2026-01-22 10:19:46', '1', '2026-01-22 10:19:46', '0', NULL, NULL);

-- Table: products
TRUNCATE TABLE `products`;
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('1', NULL, 'Non-Stick Electric Rice Cooker', 'non-stick-electric-rice-cooker', '<p>সম্পূর্ণ স্পেসিফিকেশন<br />পণ্য: রাইস কুকার<br />মডেল: ✅ MC06-1<br />ধারণক্ষমতা: ১.৫ লিটার<br />বডির উপাদান: প্লাস্টিক বডি ও নন-স্টিক পট<br />পাওয়ার: আনুমানিক ৩০০W&ndash;৫০০W<br />ভোল্টেজ: ২২০V<br />ওজন: ১.৫ কেজি</p>
<p>বৈশিষ্ট্যসমূহ:</p>
<p>দ্রুত গরম হয় এবং কম বিদ্যুৎ খরচে রান্না করে</p>
<p>সহজে ব্যবহার ও পরিষ্কার করা যায়, রিমুভেবল কুকিং পটসহ</p>
<p>কমপ্যাক্ট ও হালকা ডিজাইন, ছোট জায়গায় ব্যবহার ও বহনে সুবিধাজনক</p>
<p>রান্না শেষ হলে স্বয়ংক্রিয় কিপ-ওয়ার্ম ফাংশন চালু হয়</p>
<p>তাপ-সহনশীল হাতলসহ নিরাপদ ও টেকসই ডিজাইন</p>
<p>প্যাকেজে যা থাকছে<br />ইলেকট্রিক রাইস কুকার (১.৫ লিটার)</p>
<p>রিমুভেবল নন-স্টিক কুকিং পট</p>
<p>মেজারিং কাপ</p>
<p>রাইস প্যাডেল (খুন্তি)</p>
<p>পাওয়ার কর্ড</p>
<p>ইউজার ম্যানুয়াল</p>
<h3 data-start=\"771\" data-end=\"787\"><br />পণ্যের বিবরণ</h3>
<p data-start=\"789\" data-end=\"1015\">এই নন-স্টিক ইলেকট্রিক রাইস কুকারটি ১&ndash;২ জনের জন্য আদর্শ। এতে সহজেই ভাত, খিচুড়ি, নুডলস, স্যুপসহ বিভিন্ন ধরনের খাবার রান্না করা যায়। ছোট পরিবার, অফিস, হোস্টেল বা ছোট রান্নাঘরের জন্য এটি একটি পারফেক্ট মাল্টিফাংশনাল রাইস কুকার।</p>
<p data-start=\"1017\" data-end=\"1208\">এর ইলেকট্রিক সিস্টেম দ্রুত রান্না করে এবং নন-স্টিক পটে রান্না করা খাবার হয় সুস্বাদু ও স্বাস্থ্যকর। টেকসই ও নিরাপদ ডিজাইন দীর্ঘদিন ব্যবহারের উপযোগী, যা আপনাকে দেবে ঝামেলাহীন রান্নার অভিজ্ঞতা।</p>
<div class=\"text-center\"><img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/11-Jan-2026/images/1768124243-402664_800X800.png\" alt=\"Non-Stick Electric Rice Cooker\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/11-Jan-2026/images/1768124261-401265_800X800.png\" alt=\"Non-Stick Electric Rice Cooker\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/11-Jan-2026/images/1768124261-401276_800X800.png\" alt=\"Non-Stick Electric Rice Cooker\" /></div>', '1380', '999', 'V6CW2MF8U', '0', '0', '1', '2026-01-19 19:24:19', '2026-01-19 23:48:05', NULL, '0', 'after_content', NULL, '80', '130', NULL, NULL, NULL, '645', '1', '1', NULL);
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('2', NULL, 'Sink and Drain Cleaner', 'sink-and-drain-cleaner', '<p data-start=\"179\" data-end=\"237\">&nbsp;</p>
<h3 data-start=\"244\" data-end=\"269\"><span style=\"font-family: verdana, geneva, sans-serif;\">🧪 <strong data-start=\"251\" data-end=\"267\">ব্যবহারবিধি:</strong></span></h3>
<p data-start=\"270\" data-end=\"482\"><span style=\"font-family: verdana, geneva, sans-serif;\">1️⃣ একটি পাউডার বোতল&nbsp;<strong data-start=\"291\" data-end=\"316\">টয়লেট কমোডে ঢেলে দিন</strong></span><br data-start=\"316\" data-end=\"319\" /><span style=\"font-family: verdana, geneva, sans-serif;\">2️⃣ তারপরে&nbsp;<strong data-start=\"330\" data-end=\"352\">১০০০ মিলি গরম পানি</strong>&nbsp;ঢালুন</span><br data-start=\"358\" data-end=\"361\" /><span style=\"font-family: verdana, geneva, sans-serif;\">3️⃣&nbsp;<strong data-start=\"365\" data-end=\"386\">৩০ মিনিট রেখে দিন</strong></span><br data-start=\"386\" data-end=\"389\" /><span style=\"font-family: verdana, geneva, sans-serif;\">4️⃣ শক্তিশালী ফোমিং অ্যাকশন নিজেই সব ময়লা ও ব্লকেজ দূর করে দেবে &ndash; আপনাকে ঘষাঘষি করতে হবে না!</span></p>
<hr data-start=\"484\" data-end=\"487\" />
<h3 data-start=\"489\" data-end=\"531\"><span style=\"font-family: verdana, geneva, sans-serif;\">🔧&nbsp;<strong data-start=\"496\" data-end=\"529\">প্রোডাক্ট ব্যবহারযোগ্য স্থান:</strong></span></h3>
<p data-start=\"532\" data-end=\"599\"><span style=\"font-family: verdana, geneva, sans-serif;\">✅ রান্নাঘরের ড্রেন</span><br data-start=\"550\" data-end=\"553\" /><span style=\"font-family: verdana, geneva, sans-serif;\">✅ টয়লেট</span><br data-start=\"561\" data-end=\"564\" /><span style=\"font-family: verdana, geneva, sans-serif;\">✅ বাথরুম</span><br data-start=\"572\" data-end=\"575\" /><span style=\"font-family: verdana, geneva, sans-serif;\">✅ ওয়াশরুমের পাইপ ও কমোড</span></p>
<hr data-start=\"601\" data-end=\"604\" />
<h3 data-start=\"606\" data-end=\"627\"><span style=\"font-family: verdana, geneva, sans-serif;\">✅&nbsp;<strong data-start=\"612\" data-end=\"625\">উপকারিতা:</strong></span></h3>
<ul data-start=\"628\" data-end=\"751\">
<li data-start=\"628\" data-end=\"651\">
<p data-start=\"630\" data-end=\"651\"><span style=\"font-family: verdana, geneva, sans-serif;\">জেদি ব্লকেজ দূর করে</span></p>
</li>
<li data-start=\"652\" data-end=\"694\">
<p data-start=\"654\" data-end=\"694\"><span style=\"font-family: verdana, geneva, sans-serif;\">দুর্গন্ধ ও ব্যাকটেরিয়া দূর করতে সহায়ক</span></p>
</li>
<li data-start=\"695\" data-end=\"721\">
<p data-start=\"697\" data-end=\"721\"><span style=\"font-family: verdana, geneva, sans-serif;\">কোনো ক্ষতিকর গ্যাস নেই</span></p>
</li>
<li data-start=\"722\" data-end=\"751\">
<p data-start=\"724\" data-end=\"751\"><span style=\"font-family: verdana, geneva, sans-serif;\">সহজ ব্যবহারযোগ্য ও বহনযোগ্য</span></p>
</li>
</ul>
<hr data-start=\"753\" data-end=\"756\" />
<p>&nbsp;</p>
<h3 data-start=\"758\" data-end=\"828\"><span style=\"font-family: verdana, geneva, sans-serif;\">🛒&nbsp;<strong data-start=\"765\" data-end=\"828\">এখনই অর্ডার করুন &ndash; টয়লেট ও পাইপ রাখুন ঝকঝকে ও ব্লকেজমুক্ত!</strong></span></h3>
<div class=\"text-center\"><span style=\"font-family: verdana, geneva, sans-serif;\"><img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/30-Nov-2025/images/1764496277-drain-cleaner-powder-sink-drain-pipes-toilet-blockage-cleaner-drainizer-drainizer-buy-1-get-1-free-zaavio-37559857250474.jpg\" alt=\"Sink and Drain Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/30-Nov-2025/images/1764496330-61SRxjlaRSL._AC_UF1000%2C1000_QL80_.jpg\" alt=\"Sink and Drain Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/30-Nov-2025/images/1764496370-f98b5b3a711f70f9679205e38b182e76.jpg\" alt=\"Sink and Drain Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/30-Nov-2025/images/1764496377-71GtUrOB4HL.jpg\" alt=\"Sink and Drain Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/30-Nov-2025/images/1764496389-1079699_wild-tornado-sink-drain-cleaner-value-pack.jpeg\" alt=\"Sink and Drain Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/30-Nov-2025/images/1764496393-s-l1200.jpg\" alt=\"Sink and Drain Cleaner\" /></span></div>', '899', '650', 'GL9PMZVQ', '0', '0', '1', '2026-01-23 15:30:56', '2026-01-23 15:30:56', NULL, '0', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></span></div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</span></div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</span></div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</span></div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></span></div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\">ঢাকার মধ্যেঃ 80/- টাকা</span></div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\">ঢাকার বাইরেঃ 130/- টাকা</span></div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></span></div>
<div dir=\"auto\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</span></div>
</div>', NULL, NULL, '185', '1', '1', '💥 টয়লেট ও পাইপ পরিষ্কারের জাদুকর পাউডার – শক্তিশালী ফোম ক্লিনিং এজেন্ট

কিচেন, টয়লেট ও বাথরুমের পাইপের ব্লকেজ দূর করুন সহজেই!');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('3', NULL, 'Kitchen Foam Cleaner', 'kitchen-foam-cleaner', '<h2 data-start=\"62\" data-end=\"112\">Kitchen Foam Cleaner<br />কিচেন ক্লিনার ফোম ক্লিনিং স্প্রে &ndash; ৫০০ মি.লি.</h2>
<p data-start=\"113\" data-end=\"139\"><strong data-start=\"113\" data-end=\"139\">সহজ ও কার্যকর পরিষ্কার</strong></p>
<h3 data-start=\"141\" data-end=\"159\">পণ্যের বিবরণ</h3>
<p data-start=\"160\" data-end=\"429\">কিচেন ক্লিনার ফোম ক্লিনিং স্প্রে একটি শক্তিশালী ওয়াটার-বেসড ক্লিনার যা রান্নাঘরের সব ধরনের সরঞ্জাম ও পৃষ্ঠের জেদি তেল, ময়লা ও দাগ সহজেই পরিষ্কার করে। এর ফোম ফর্মুলা গভীরভাবে ময়লার ভেতরে প্রবেশ করে, ফলে পরিষ্কার করা হয় ঝামেলাহীন ও দ্রুত। শুধু স্প্রে করুন এবং ধুয়ে ফেলুন।</p>
<h3 data-start=\"431\" data-end=\"450\">বৈশিষ্ট্যসমূহ</h3>
<ul data-start=\"451\" data-end=\"696\">
<li data-start=\"451\" data-end=\"496\">
<p data-start=\"453\" data-end=\"496\">সব ধরনের রান্নাঘরের সরঞ্জামে ব্যবহারযোগ্য</p>
</li>
<li data-start=\"497\" data-end=\"556\">
<p data-start=\"499\" data-end=\"556\">ব্যবহার সহজ ও ঝামেলাহীন &mdash; শুধু স্প্রে করুন ও ধুয়ে ফেলুন</p>
</li>
<li data-start=\"557\" data-end=\"589\">
<p data-start=\"559\" data-end=\"589\">জেদি তেল ও দাগ সহজেই দূর করে</p>
</li>
<li data-start=\"590\" data-end=\"647\">
<p data-start=\"592\" data-end=\"647\">ওয়াটার-বেসড ক্লিনার যা ফোমে পরিণত হয়ে ভালো কভারেজ দেয়</p>
</li>
<li data-start=\"648\" data-end=\"696\">
<p data-start=\"650\" data-end=\"696\">রান্নাঘর পরিষ্কার করা হয় দ্রুত ও সময় সাশ্রয়ী</p>
</li>
</ul>
<h3 data-start=\"698\" data-end=\"716\">স্পেসিফিকেশন</h3>
<ul data-start=\"717\" data-end=\"853\">
<li data-start=\"717\" data-end=\"750\">
<p data-start=\"719\" data-end=\"750\"><strong data-start=\"719\" data-end=\"734\">পণ্যের ধরন:</strong>&nbsp;কিচেন ক্লিনার</p>
</li>
<li data-start=\"751\" data-end=\"781\">
<p data-start=\"753\" data-end=\"781\"><strong data-start=\"753\" data-end=\"768\">নেট পরিমাণ:</strong>&nbsp;৫০০ মি.লি.</p>
</li>
<li data-start=\"782\" data-end=\"830\">
<p data-start=\"784\" data-end=\"830\"><strong data-start=\"784\" data-end=\"800\">পণ্যের আকার:</strong>&nbsp;৬ সেমি &times; ৬ সেমি &times; ২৩.৫ সেমি</p>
</li>
<li data-start=\"831\" data-end=\"853\">
<p data-start=\"833\" data-end=\"853\"><strong data-start=\"833\" data-end=\"841\">ওজন:</strong>&nbsp;৫১৪ গ্রাম</p>
</li>
</ul>
<div class=\"text-center\"><img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/06-Oct-2022/images/1665023503-1634038762-Kitchen-Cleaner1.jpg\" alt=\"Kitchen Foam Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/06-Oct-2022/images/1665023511-1634039083-Kitchen-Cleaner3.jpg\" alt=\"Kitchen Foam Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/06-Oct-2022/images/1665023508-1634039083-Kitchen-Cleaner2.jpg\" alt=\"Kitchen Foam Cleaner\" />&nbsp;<img class=\"my-2 border img-fluid\" src=\"https://iuddokta.com/storage/06-Oct-2022/images/1665023505-1634038762-Kitchen-Cleaner.jpg\" alt=\"Kitchen Foam Cleaner\" /></div>', '1050', '750', 'B5H8FPEK', '0', '0', '1', '2026-01-23 15:39:20', '2026-01-23 15:39:20', NULL, '0', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, '265', '1', '1', 'কিচেন ক্লিনার ফোম ক্লিনিং স্প্রে একটি শক্তিশালী ওয়াটার-বেসড ক্লিনার যা রান্নাঘরের সব ধরনের সরঞ্জাম ও পৃষ্ঠের জেদি তেল, ময়লা ও দাগ সহজেই পরিষ্কার করে। এর ফোম ফর্মুলা গভীরভাবে ময়লার ভেতরে প্রবেশ করে, ফলে পরিষ্কার করা হয় ঝামেলাহীন ও দ্রুত। শুধু স্প্রে করুন এবং ধুয়ে ফেলুন।');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('4', NULL, 'Multipurpose Jhury', 'multipurpose-jhury', '<p><strong>📌মাল্টিপারপাস প্লাস্টিক ঝুড়ি &mdash; ঘর সাজাতে ও গুছিয়ে রাখতে পারফেক্ট সমাধান!</strong></p>
<p>&nbsp;</p>
<p><strong>আপনার ঘর, রান্নাঘর বা অফিস আরও গুছানো ও সুন্দর রাখতে প্রয়োজন একটি টেকসই ও স্মার্ট স্টোরেজ ঝুড়ি। এই মাল্টিপারপাস প্লাস্টিক ঝুড়ি ব্যবহার করে আপনি খুব সহজে সবকিছু সাজিয়ে রাখতে পারবেন&mdash;ডেইলি ইউজ থেকে শুরু করে বাথরুম, কিচেন বা ওয়্যারড্রোব সব জায়গায় মানিয়ে যাবে!</strong></p>
<p><strong>স্টাইলিশ ডিজাইন, হালকা ও মজবুত গঠন এবং বড় ধারণক্ষমতা&mdash;এই ঝুড়িটা আপনার দৈনন্দিন কাজে এনে দেবে সম্পূর্ণ সুবিধা ও পরিপাটি লুক।</strong></p>
<p>&nbsp;</p>
<p><strong>⭐ ফিচারস ও সুবিধা</strong></p>
<p><strong>✅ মাল্টিপারপাস ব্যবহার &ndash; কিচেন, বাথরুম, ফ্রিজ, টেবিল, ড্রেসিং, অফিস, স্টোররুম সব জায়গায় ব্যবহারযোগ্য</strong></p>
<p><strong>✅ মজবুত প্লাস্টিক &ndash; টেকসই ও দীর্ঘদিন ব্যবহার উপযোগী</strong></p>
<p><strong>✅ হালকা ও সহজে বহনযোগ্য &ndash; লিফট করা সহজ, এক জায়গা থেকে অন্য জায়গায় নেওয়া ঝামেলা নেই</strong></p>
<p><strong>✅ এয়ার ফ্লো ডিজাইন &ndash; ভেতরের জিনিসে বাতাস প্রবাহ হয়, ভেজা/দুর্গন্ধ হওয়ার সম্ভাবনা কম</strong></p>
<p><strong>✅ সহজে পরিষ্কার করা যায় &ndash; পানিতে ধুয়ে বা কাপড় দিয়ে মুছে পরিষ্কার করা যাবে</strong></p>
<p><strong>✅ স্টাইলিশ ও আধুনিক লুক &ndash; যে কোনো ঘরের সাজের সঙ্গে মানানসই</strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>✅ ব্যবহার করতে পারবেন যেসব কাজে</strong></p>
<p><strong>🧺 ফল-সবজি রাখার জন্য</strong></p>
<p><strong>🧴 বাথরুমের জিনিসপত্র</strong></p>
<p><strong>🧦 মোজা-অন্তর্বাস/কাপড়</strong></p>
<p><strong>📚 বই-খাতা বা স্টেশনারি</strong></p>
<p><strong>🧸 খেলনা বা শিশুর জিনিস</strong></p>
<p><strong>🧂 রান্নাঘরের ছোটখাটো আইটেম</strong></p>
<p><strong>🔥 কেন এটি আপনার জন্য পারফেক্ট?</strong></p>
<p>&nbsp;</p>
<p><strong>আপনি যদি চান কম জায়গায় বেশি জিনিস সুন্দরভাবে গুছিয়ে রাখতে, তাহলে এই ঝুড়ি আপনার ঘরের জন্য একদম উপযুক্ত। এটি শুধু ব্যবহারিক নয়, আপনার ঘরকে আরও পরিপাটি ও এলিগ্যান্ট করে তুলবে।</strong></p>
<p>&nbsp;</p>
<p><strong>✅ অর্ডার করুন এখনই!</strong></p>
<p><strong>স্টক সীমিত&mdash;আপনার ঘরকে গুছিয়ে রাখার জন্য আজই নিয়ে নিন মাল্টিপারপাস প্লাস্টিক ঝুড়ি।</strong></p>', '1200', '950', 'WDLM78', '0', '0', '1', '2026-01-23 15:48:32', '2026-01-23 15:48:32', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, '425', '1', '1', 'আপনার ঘর, রান্নাঘর বা অফিস আরও গুছানো ও সুন্দর রাখতে প্রয়োজন একটি টেকসই ও স্মার্ট স্টোরেজ ঝুড়ি। এই মাল্টিপারপাস প্লাস্টিক ঝুড়ি ব্যবহার করে আপনি খুব সহজে সবকিছু সাজিয়ে রাখতে পারবেন—ডেইলি ইউজ থেকে শুরু করে বাথরুম, কিচেন বা ওয়্যারড্রোব সব জায়গায় মানিয়ে যাবে!');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('5', NULL, 'Lubricant Lube Love -(Blueberry Gel)', 'lubricant-lube-love-blueberry-gel', '<p data-path-to-node=\"7\">জাপানিজ প্রযুক্তিতে তৈরি <strong data-path-to-node=\"7\" data-index-in-node=\"25\">Tonohime Grape Gel</strong> একটি প্রিমিয়াম মানের ওয়াটার-বেসড লুব্রিকেন্ট, যা আপনার ব্যক্তিগত মুহূর্তগুলোতে যোগ করবে আঙুরের মিষ্টি সুবাস এবং সিল্কি মসৃণতা।</p>
<p data-path-to-node=\"8\"><strong data-path-to-node=\"8\" data-index-in-node=\"0\">কেন এটি সেরা পছন্দ?</strong></p>
<ul data-path-to-node=\"9\">
<li>
<p data-path-to-node=\"9,0,0\"><strong data-path-to-node=\"9,0,0\" data-index-in-node=\"0\">রিফ্রেশিং গ্রেপ ফ্লেভার:</strong> আঙুরের চমৎকার সুবাস আপনার অভিজ্ঞতায় নিয়ে আসবে এক ভিন্ন আমেজ।</p>
</li>
<li>
<p data-path-to-node=\"9,1,0\"><strong data-path-to-node=\"9,1,0\" data-index-in-node=\"0\"><span class=\"citation-71\">ওয়াটার-বেসড ফর্মুলা:</span></strong><span class=\"citation-71 citation-end-71\"> এটি একদম চটচটে নয় এবং ব্যবহারের পর খুব সহজেই পানি দিয়ে পরিষ্কার করা যায়।</span></p>
<div class=\"source-inline-chip-container ng-star-inserted\">&nbsp;</div>
</li>
<li>
<p data-path-to-node=\"9,2,0\"><strong data-path-to-node=\"9,2,0\" data-index-in-node=\"0\">দীর্ঘস্থায়ী মসৃণতা:</strong> একবার ব্যবহারেই পাওয়া যায় দীর্ঘস্থায়ী পিচ্ছিলতা, যা বারবার ব্যবহারের ঝামেলা কমায় এবং আরাম নিশ্চিত করে।</p>
</li>
<li>
<p data-path-to-node=\"9,3,0\"><strong data-path-to-node=\"9,3,0\" data-index-in-node=\"0\"><span class=\"citation-70\">ত্বকের জন্য নিরাপদ:</span></strong><span class=\"citation-70 citation-end-70\"> এটি চর্মরোগ বিশেষজ্ঞ দ্বারা পরীক্ষিত এবং ক্ষতিকর কেমিক্যাল মুক্ত, তাই সব ধরণের ত্বকের জন্য উপযোগী।</span></p>
<div class=\"source-inline-chip-container ng-star-inserted\">&nbsp;</div>
</li>
<li>
<p data-path-to-node=\"9,4,0\"><strong data-path-to-node=\"9,4,0\" data-index-in-node=\"0\"><span class=\"citation-69\">কন্ডোম ও খেলনার সাথে নিরাপদ:</span></strong><span class=\"citation-69 citation-end-69\"> এটি ল্যাটেক্স কন্ডোম এবং সব ধরণের ইন্টিমেট টয়-এর সাথে ব্যবহারের জন্য সম্পূর্ণ নিরাপদ।</span></p>
<div class=\"source-inline-chip-container ng-star-inserted\">&nbsp;</div>
</li>
<li>
<p data-path-to-node=\"9,5,0\"><strong data-path-to-node=\"9,5,0\" data-index-in-node=\"0\">সহজ বহনযোগ্য:</strong> ১০০ মিলির কমপ্যাক্ট বোতল হওয়ায় এটি ভ্রমণে বা যেকোনো জায়গায় সহজেই সাথে রাখা যায়।</p>
</li>
</ul>
<p data-path-to-node=\"10\">আপনার বিশেষ মুহূর্তগুলোকে আরও আনন্দময় ও নিরাপদ করতে আজই বেছে নিন <strong data-path-to-node=\"10\" data-index-in-node=\"65\">Tonohime Grape Gel</strong>।</p>', '799', '450', '53PZ6FYW', '0', '0', '1', '2026-01-23 16:05:06', '2026-01-23 16:05:06', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', 'আপনার বিশেষ মুহূর্তগুলোকে করুন আরও মধুময় ও সতেজ! 🍇✨');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('6', NULL, 'Microfiber Dusting Mop-Brush', 'microfiber-dusting-mop-brush', '<p data-path-to-node=\"6\"><strong data-path-to-node=\"6\" data-index-in-node=\"0\">আপনার ঘর ও আসবাবপত্রকে ধুলোমুক্ত রাখতে নিয়ে এলাম আধুনিক মাইক্রোফাইবার ডাস্টিং মপ-ব্রাশ। এটি শুধু একটি সাধারণ ব্রাশ নয়, বরং আপনার প্রতিদিনের ক্লিনিংয়ের সবচেয়ে বিশ্বস্ত সঙ্গী।</strong></p>
<h3 data-path-to-node=\"7\"><strong data-path-to-node=\"7\" data-index-in-node=\"0\">কেন এটি আপনার জন্য সেরা?</strong></h3>
<ul data-path-to-node=\"8\">
<li>
<p data-path-to-node=\"8,0,0\"><strong data-path-to-node=\"8,0,0\" data-index-in-node=\"0\">উন্নত মাইক্রোফাইবার টেকনোলজি:</strong> এর অতি সূক্ষ্ম তন্তুগুলো সাধারণ ঝাড়ুর চেয়ে অনেক বেশি ধুলো ও জীবাণু আটকে রাখতে সক্ষম। এটি ধুলোবালি বাতাসে না ছড়িয়ে সরাসরি নিজের ভেতরে শুষে নেয়।</p>
</li>
<li>
<p data-path-to-node=\"8,1,0\"><strong data-path-to-node=\"8,1,0\" data-index-in-node=\"0\">মাল্টিপারপাস ব্যবহার:</strong> এটি শুধুমাত্র মেঝে পরিষ্কারের জন্য নয়; এটি দিয়ে আপনি সিলিং ফ্যান, দেয়াল, সোফা, জানালার গ্রিল এমনকি আপনার শখের গাড়িটিও পরিষ্কার করতে পারবেন।</p>
</li>
<li>
<p data-path-to-node=\"8,2,0\"><strong data-path-to-node=\"8,2,0\" data-index-in-node=\"0\">সহজে ব্যবহারযোগ্য ও নমনীয়:</strong> এর নমনীয় (flexible) ডিজাইন এবং লম্বা হাতল থাকায় সোফার নিচ বা আলমারির উপরের মতো দুর্গম জায়গাগুলোতে খুব সহজেই পৌঁছে যায়।</p>
</li>
<li>
<p data-path-to-node=\"8,3,0\"><strong data-path-to-node=\"8,3,0\" data-index-in-node=\"0\">পরিবেশবান্ধব ও সাশ্রয়ী:</strong> এটি বারবার ধুয়ে ব্যবহার করা যায়, তাই বারবার নতুন মপ কেনার প্রয়োজন নেই। এটি পানি এবং ডিটারজেন্টও সাশ্রয় করে।</p>
</li>
<li>
<p data-path-to-node=\"8,4,0\"><strong data-path-to-node=\"8,4,0\" data-index-in-node=\"0\">স্ক্র্যাচ-ফ্রি ক্লিনিং:</strong> এটি খুবই নরম হওয়ায় দামি আসবাবপত্র বা গাড়ির বডিতে কোনো ধরনের দাগ বা স্ক্র্যাচ ফেলে না।</p>
</li>
</ul>
<hr data-path-to-node=\"9\" />
<h2 data-path-to-node=\"10\"><strong data-path-to-node=\"10\" data-index-in-node=\"0\">Key Features (মূল বৈশিষ্ট্যসমূহ)</strong></h2>
<ul data-path-to-node=\"11\">
<li>
<p data-path-to-node=\"11,0,0\"><strong data-path-to-node=\"11,0,0\" data-index-in-node=\"0\">ম্যাটেরিয়াল:</strong> হাই-কোয়ালিটি মাইক্রোফাইবার ও মজবুত স্টেইনলেস স্টিল/প্লাস্টিক বডি।</p>
</li>
<li>
<p data-path-to-node=\"11,1,0\"><strong data-path-to-node=\"11,1,0\" data-index-in-node=\"0\">ব্যবহার:</strong> ঘর, অফিস, গাড়ি এবং আসবাবপত্র পরিষ্কারের জন্য উপযোগী।</p>
</li>
<li>
<p data-path-to-node=\"11,2,0\"><strong data-path-to-node=\"11,2,0\" data-index-in-node=\"0\">সুবিধা:</strong> ধোয়া যায় (Washable), ওজনে হালকা এবং মজবুত।</p>
</li>
</ul>', '850', '650', 'ZYR5M3', '0', '0', '1', '2026-01-23 16:22:43', '2026-01-23 16:22:43', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', 'স্মার্ট ক্লিনিংয়ের জন্য মাইক্রোফাইবার ডাস্টিং মপ - ঘর হোক ঝকঝকে তকতকে!');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('7', NULL, 'Stone Cleaner', 'stone-cleaner', '<p data-path-to-node=\"6\">পাথর পরিষ্কার আপনার রুমের টাইলস, মোজাইক, বাথরুম অথবা ঘর এর ফ্লোর টাইলস এর দাগ দূর করতে পারবেন। কিচেন অথবা বাথরুম হবে নতুন এর মত ঝকঝকে । কিচেন হুডের তেল গ্রীস পরিষ্কারের জন্য এটি খুবই ভালো ম্যাজিকের মতো কাজ করবে। Weight: 450 ML</p>', '990', '599', '8KBQM7AS', '0', '0', '1', '2026-01-23 16:28:17', '2026-01-23 16:28:17', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', 'পাথর পরিষ্কার আপনার রুমের টাইলস, মোজাইক, বাথরুম অথবা ঘর এর ফ্লোর টাইলস এর দাগ দূর করতে পারবেন। কিচেন অথবা বাথরুম হবে নতুন এর মত ঝকঝকে । কিচেন হুডের তেল গ্রীস পরিষ্কারের জন্য এটি খুবই ভালো ম্যাজিকের মতো কাজ করবে। Weight: 450 ML');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('8', NULL, 'Posture Corrector Backpain Belt', 'posture-corrector-backpain-belt', '<p data-path-to-node=\"6\"><strong>১০০% কার্যকারী। ব্যাক পেইন নিরাময় হবে। কুজো মেরুদণ্ড হবে সোজা। কর্পোরেট জব করেন অথবা সারাদিন কম্পিউটার কাজ করেন অথবা যাদের মেরুদণ্ড পেইন থাকে।<br /></strong><br />✅ মেরুদন্ড সোজা রাখার জন্য উপকারী <br />✅ ঘাড় ব্যাথা ,কাঁধ ব্যথা ইত্যাদির উপশম হবে এখন আরও সহজে। <br />✅যারা কুঁজো হয়ে হাঁটেন, দীর্ঘক্ষন কম্পিউটারের সামনে বসে থেকে <br />✅যাদের পিঠ ব্যথা, সোজা হয়ে কাজ করতে পারেন না তাদের জন্য <br />✅এটা ব্যবহারে মেরুদন্ড বাকা হতে দেবে না <br />✅সোজা হয়েই কাজ করতে বা পড়তে পারবেন <br />✅ছেলে মেয়ে এবং যে কোন বয়সীদের জন্য <br />✅ফ্রিল্যান্সার থেকে শুরু করে যাদের কম্পিউটারের সামনে ঝুকে কাজ করতে হয় সবার জন্য <br />✅এটা মেরুদন্ডকে সোজা রাখতে সাহায্য করবে, যার ফলে আপনাকে লম্বা ও ফিট দেখাবে <br />#backpain #backpainbelt</p>', '850', '599', '78RB5W4', '0', '0', '1', '2026-01-23 16:42:42', '2026-01-23 16:42:42', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', 'ব্যাক পেইন নিরাময় হবে। কুজো মেরুদণ্ড হবে সোজা। কর্পোরেট জব করেন অথবা সারাদিন কম্পিউটার কাজ করেন অথবা যাদের মেরুদণ্ড পেইন থাকে।');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('9', NULL, 'Kids Study Reading Table', 'kids-study-reading-table', '<p data-path-to-node=\"6\">শিশুদের আনন্দের লেখাপড়ার সময়কে আরো আনন্দদায়ক করতে ব্যবহার করুন মাল্টি ফাংশনাল সোনামনি ডেস্ক । যে ডেস্ক ব্যবহার করে আপনার সোনামনি খেলাধুলার পাশাপাশি লেখাপড়াও করতে পারবে । খেলাধুলার ক্ষেত্রেও ব্যবহার করতে পারবে, পড়ালেখার কাজেও ব্যবহার করতে পারবে ডেস্ক টেবিলটি। টেবিলটি বহনযোগ্য যেকোনো জায়গায় বসে সোনামণিরা পড়তে পারবে। এই টেবিলটি আপনি বিছানা,সোফা,বারান্দা, মেঝেতে বসে খুব সহজেই ব্যাবহার করতে পারবেন। আপনার সোনামণির পড়ালেখা ও অনলাইন ক্লাসের জন্য ব্যাবহার করতে পারবেন। টেবিলটি ৩ থেকে ১০ বছরের শিশু ব্যবহার করতে পারবে। টেবিলের সাইজ: Height: 19cm (8 Inch) Width: 52cm (21 Inch) Depth: 26cm (10.2 Inch) Color: (Multi Color : Sky Blue, Green &amp; Pink )</p>', '950', '650', 'ZVYNRGMBL', '0', '0', '1', '2026-01-23 16:47:42', '2026-01-23 16:47:42', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', 'শিশুদের আনন্দের লেখাপড়ার সময়কে আরো আনন্দদায়ক করতে ব্যবহার করুন মাল্টি ফাংশনাল সোনামনি ডেস্ক ।');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('10', NULL, 'Hair Straight Comb', 'hair-straight-comb', '<h3 data-start=\"132\" data-end=\"165\">✨ হেয়ার স্ট্রেইটেনিং কম্ব ✨</h3>
<p data-start=\"167\" data-end=\"367\">হেয়ার স্ট্রেইটেনিং কম্ব একটি স্টাইলিং টুল যা কার্লি বা ওয়েভি চুল সোজা করতে ব্যবহৃত হয়। এতে হিটেড মেটাল বা সিরামিক প্লেট থাকে যা কম্বের সাথে যুক্ত থাকে, ফলে সহজেই চুল আঁচড়ানোর সাথে সাথে সোজা করা যায়।</p>
<p data-start=\"369\" data-end=\"474\">💇&zwj;♀️&nbsp;<strong data-start=\"375\" data-end=\"394\">ব্যবহার উপযোগী:</strong>&nbsp;সব ধরনের চুলে, তবে বিশেষভাবে ঘন, রুক্ষ ও কোঁকড়া চুলের জন্য এটি দারুণ কার্যকর।</p>
<hr data-start=\"476\" data-end=\"479\" />
<h3 data-start=\"481\" data-end=\"501\">🔥 ব্যবহার বিধি:</h3>
<p data-start=\"502\" data-end=\"729\">1️⃣ প্রথমে চুল ভালোভাবে ধুয়ে শুকিয়ে নিন।<br data-start=\"542\" data-end=\"545\" />2️⃣ কম্ব প্লাগ ইন করে প্রয়োজনীয় টেম্পারেচারে গরম হতে দিন।<br data-start=\"602\" data-end=\"605\" />3️⃣ চুল সেকশন করে মূল থেকে আগা পর্যন্ত কম্ব চালান।<br data-start=\"655\" data-end=\"658\" />4️⃣ ব্যবহারের আগে অবশ্যই&nbsp;<strong data-start=\"683\" data-end=\"713\">হিট প্রোটেক্ট্যান্ট স্প্রে</strong>&nbsp;ব্যবহার করুন।</p>
<p data-start=\"731\" data-end=\"745\">⚠️ সাবধানতা:</p>
<ul data-start=\"746\" data-end=\"881\">
<li data-start=\"746\" data-end=\"790\">
<p data-start=\"748\" data-end=\"790\">সবসময় লো থেকে মিডিয়াম হিটে ব্যবহার করুন।</p>
</li>
<li data-start=\"791\" data-end=\"828\">
<p data-start=\"793\" data-end=\"828\">এক জায়গায় বেশি সময় ধরে রাখবেন না।</p>
</li>
<li data-start=\"829\" data-end=\"881\">
<p data-start=\"831\" data-end=\"881\">নিয়মিত ডিপ কন্ডিশনিং করলে চুল থাকবে স্বাস্থ্যকর।</p>
</li>
</ul>
<hr data-start=\"883\" data-end=\"886\" />
<h3 data-start=\"888\" data-end=\"911\">🌟 বিশেষ বৈশিষ্ট্য:</h3>
<ul data-start=\"912\" data-end=\"1306\">
<li data-start=\"912\" data-end=\"1008\">
<p data-start=\"914\" data-end=\"1008\"><strong data-start=\"914\" data-end=\"941\">Adjustable Heat Setting</strong>&nbsp;👉 আপনার চুলের ধরন ও স্টাইল অনুযায়ী টেম্পারেচার সেট করতে পারবেন।</p>
</li>
<li data-start=\"1009\" data-end=\"1102\">
<p data-start=\"1011\" data-end=\"1102\"><strong data-start=\"1011\" data-end=\"1035\">Auto Shut-off System</strong>&nbsp;👉 নির্দিষ্ট সময় পর নিজে থেকেই বন্ধ হয়ে যায়, ফলে নিরাপদ ব্যবহার।</p>
</li>
<li data-start=\"1103\" data-end=\"1166\">
<p data-start=\"1105\" data-end=\"1166\"><strong data-start=\"1105\" data-end=\"1124\">Cool Tip Design</strong>&nbsp;👉 মাথার তালু ও আঙুল পোড়া থেকে সুরক্ষা।</p>
</li>
<li data-start=\"1167\" data-end=\"1240\">
<p data-start=\"1169\" data-end=\"1240\"><strong data-start=\"1169\" data-end=\"1186\">Multi-Styling</strong>&nbsp;👉 চুল সোজা, কার্ল বা স্টাইলিশ লুক &ndash; সবকিছু একসাথে!</p>
</li>
<li data-start=\"1241\" data-end=\"1306\">
<p data-start=\"1243\" data-end=\"1306\"><strong data-start=\"1243\" data-end=\"1256\">Long Cord</strong>&nbsp;👉 1.8 মিটার লম্বা তার সহজ ব্যবহার নিশ্চিত করে।</p>
</li>
</ul>
<hr data-start=\"1308\" data-end=\"1311\" />
<p data-start=\"1313\" data-end=\"1397\">👉 সুন্দর, সোজা ও মসৃণ চুলের জন্য হেয়ার স্ট্রেইটেনিং কম্ব &ndash; আপনার স্টাইলিং সলিউশন!</p>', '1250', '950', 'GLUBEQ', '0', '0', '1', '2026-01-23 16:52:40', '2026-01-23 16:52:40', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', 'হেয়ার স্ট্রেইটেনিং কম্ব একটি স্টাইলিং টুল যা কার্লি বা ওয়েভি চুল সোজা করতে ব্যবহৃত হয়। এতে হিটেড মেটাল বা সিরামিক প্লেট থাকে যা কম্বের সাথে যুক্ত থাকে, ফলে সহজেই চুল আঁচড়ানোর সাথে সাথে সোজা করা যায়।');
INSERT INTO `products` (`id`, `brand_id`, `name`, `slug`, `description`, `price`, `selling_price`, `sku`, `should_track`, `stock_count`, `is_active`, `created_at`, `updated_at`, `parent_id`, `desc_img`, `desc_img_pos`, `wholesale`, `shipping_inside`, `shipping_outside`, `delivery_text`, `suggested_price`, `source_id`, `average_purchase_price`, `hot_sale`, `new_arrival`, `short_description`) VALUES ('11', NULL, 'Home Essentials Combo Pack', 'home-essentials-combo-pack', '<h3 data-start=\"137\" data-end=\"208\">🏡&nbsp;<strong data-start=\"144\" data-end=\"206\">হোম এসেনশিয়ালস কম্বো প্যাক &ndash; ৬টি একসাথে আধুনিক ঘরের সমাধান</strong></h3>
<p data-start=\"209\" data-end=\"275\"><strong data-start=\"209\" data-end=\"275\">দামেও সাশ্রয়ী, ব্যবহারে দরকারি &ndash; আপনার ঘরের জন্য একদম পারফেক্ট</strong></p>
<hr data-start=\"277\" data-end=\"280\" />
<h3 data-start=\"282\" data-end=\"313\">✅&nbsp;<strong data-start=\"288\" data-end=\"313\">প্যাকেজে যা যা থাকছে:</strong></h3>
<ol data-start=\"314\" data-end=\"885\">
<li data-start=\"314\" data-end=\"398\">
<p data-start=\"317\" data-end=\"398\">🌈&nbsp;<strong data-start=\"320\" data-end=\"341\">এলইডি মাশরুম লাইট</strong>&nbsp;&ndash; ঘরের পরিবেশে জাদুকরী আলো যোগ করে নরম ও আরামদায়ক আলো।</p>
</li>
<li data-start=\"399\" data-end=\"506\">
<p data-start=\"402\" data-end=\"506\">🚪&nbsp;<strong data-start=\"405\" data-end=\"430\">ডোর ড্রাফট স্টপার ফোম</strong>&nbsp;&ndash; ধুলো ও অপ্রয়োজনীয় বাতাস থেকে ঘরকে রাখে সুরক্ষিত ও ঠান্ডা-গরম রক্ষা করে।</p>
</li>
<li data-start=\"507\" data-end=\"612\">
<p data-start=\"510\" data-end=\"612\">🧤&nbsp;<strong data-start=\"513\" data-end=\"546\">সিলিকন ম্যাজিক হ্যান্ড গ্লাভস</strong>&nbsp;&ndash; গরম সহনশীল, স্কিডপ্রুফ ও ডিশ ওয়াশ/স্ক্রাবিংয়ের জন্য পারফেক্ট।</p>
</li>
<li data-start=\"613\" data-end=\"708\">
<p data-start=\"616\" data-end=\"708\">🧼&nbsp;<strong data-start=\"619\" data-end=\"651\">মাল্টি-পারপাস ক্লিনার স্প্রে</strong>&nbsp;&ndash; ঘরের যেকোনো জায়গা দ্রুত ও কার্যকরভাবে পরিষ্কার রাখে।</p>
</li>
<li data-start=\"709\" data-end=\"800\">
<p data-start=\"712\" data-end=\"800\">🐝&nbsp;<strong data-start=\"715\" data-end=\"737\">বিওয়্যাক্স (১২০ml)</strong>&nbsp;&ndash; কাঠের ফার্নিচারকে দেয় প্রাকৃতিক ঝকঝকে উজ্জ্বলতা ও সুরক্ষা।</p>
</li>
<li data-start=\"801\" data-end=\"885\">
<p data-start=\"804\" data-end=\"885\">🥚&nbsp;<strong data-start=\"807\" data-end=\"846\">ফ্রিজের জন্য এগ হোল্ডার অর্গানাইজার</strong>&nbsp;&ndash; ডিম সংরক্ষণের স্মার্ট ও নিরাপদ উপায়।</p>
</li>
</ol>
<hr data-start=\"887\" data-end=\"890\" />
<h3 data-start=\"892\" data-end=\"928\">🛒&nbsp;<strong data-start=\"899\" data-end=\"928\">কেন নিবেন এই কম্বো প্যাক?</strong></h3>
<p>&nbsp;</p>
<ul data-start=\"929\" data-end=\"1089\">
<li data-start=\"929\" data-end=\"964\">
<p data-start=\"931\" data-end=\"964\">🔥&nbsp;<strong data-start=\"934\" data-end=\"962\">একসাথে কিনলে সাশ্রয় বেশি</strong></p>
</li>
<li data-start=\"965\" data-end=\"1021\">
<p data-start=\"967\" data-end=\"1021\">🏠&nbsp;<strong data-start=\"970\" data-end=\"1019\">ঘরের প্রয়োজনীয় ও কাজের প্রোডাক্ট এক প্যাকেজেই</strong></p>
</li>
<li data-start=\"1022\" data-end=\"1053\">
<p data-start=\"1024\" data-end=\"1053\">🎁&nbsp;<strong data-start=\"1027\" data-end=\"1051\">উপহারের জন্যও চমৎকার</strong></p>
</li>
<li data-start=\"1054\" data-end=\"1089\">
<p data-start=\"1056\" data-end=\"1089\">💡&nbsp;<strong data-start=\"1059\" data-end=\"1089\">স্টাইলিশ, স্মার্ট ও ইউজফুল</strong></p>
</li>
</ul>', '1350', '999', 'FGS2TZANR5', '0', '0', '1', '2026-01-23 17:13:09', '2026-01-23 17:13:09', NULL, '1', 'after_content', NULL, '80', '130', '<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;ডেলিভারি পদ্ধতি-</strong></div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" /></span>&nbsp;ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</div>
<div dir=\"auto\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</div>
<div dir=\"auto\">&nbsp;</div>
</div>
<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\">
<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" /></span><strong>ডেলিভারী চার্জ-</strong></div>
<div dir=\"auto\">ঢাকার মধ্যেঃ 80/- টাকা</div>
<div dir=\"auto\">ঢাকার বাইরেঃ 130/- টাকা</div>
<div dir=\"auto\">&nbsp;</div>
<div dir=\"auto\"><strong><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" /></span>&nbsp;রিটার্ন পলিসি-</strong></div>
<div dir=\"auto\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</div>
</div>', NULL, NULL, NULL, '1', '1', '🏡 হোম এসেনশিয়ালস কম্বো প্যাক – ৬টি একসাথে আধুনিক ঘরের সমাধান');

-- Table: activity_log
TRUNCATE TABLE `activity_log`;
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('1', 'orders', 'The order #1 has been created', 'App\\Models\\Order', '1', NULL, NULL, '{\"attributes\":{\"admin_id\":1,\"name\":\"Suriya Rahman\",\"phone\":\"+8801767934747\",\"address\":\"8919 145th street\",\"status\":\"PENDING\",\"status_at\":\"2026-01-20T16:20:06.000000Z\",\"products\":{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":1,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":1,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":999,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}},\"note\":null,\"data\":{\"courier\":\"Other\",\"advanced\":0,\"discount\":0,\"shipping_cost\":130,\"subtotal\":\"999\",\"packaging_charge\":25}}}', '2026-01-20 16:20:06', '2026-01-20 16:20:06', 'created', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('2', 'orders', 'The order #2 has been created', 'App\\Models\\Order', '2', NULL, NULL, '{\"attributes\":{\"admin_id\":1,\"name\":\"Suriya Rahman\",\"phone\":\"+8801767934747\",\"address\":\"8919 145th street\",\"status\":\"PENDING\",\"status_at\":\"2026-01-20T16:23:02.000000Z\",\"products\":{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":2,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":1,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":999,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}},\"note\":null,\"data\":{\"courier\":\"Other\",\"advanced\":0,\"discount\":0,\"shipping_cost\":130,\"subtotal\":\"1998\",\"packaging_charge\":25}}}', '2026-01-20 16:23:02', '2026-01-20 16:23:02', 'created', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('3', 'orders', 'The order #2 has been updated', 'App\\Models\\Order', '2', 'App\\Models\\Admin', '1', '{\"attributes\":{\"status\":\"CONFIRMED\",\"status_at\":\"2026-01-20T16:42:29.000000Z\"},\"old\":{\"status\":\"PENDING\",\"status_at\":\"2026-01-20T16:23:02.000000Z\"}}', '2026-01-20 16:42:29', '2026-01-20 16:42:29', 'updated', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('4', 'orders', 'The order #1 has been updated', 'App\\Models\\Order', '1', 'App\\Models\\Admin', '1', '{\"attributes\":{\"status\":\"CONFIRMED\",\"status_at\":\"2026-01-20T16:43:27.000000Z\"},\"old\":{\"status\":\"PENDING\",\"status_at\":\"2026-01-20T16:20:06.000000Z\"}}', '2026-01-20 16:43:27', '2026-01-20 16:43:27', 'updated', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('5', 'orders', 'The order #1 has been updated', 'App\\Models\\Order', '1', 'App\\Models\\Admin', '1', '{\"attributes\":{\"status\":\"DELIVERED\",\"status_at\":\"2026-01-20T16:44:11.000000Z\"},\"old\":{\"status\":\"CONFIRMED\",\"status_at\":\"2026-01-20T16:43:27.000000Z\"}}', '2026-01-20 16:44:11', '2026-01-20 16:44:11', 'updated', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('6', 'orders', 'The order #1 has been updated', 'App\\Models\\Order', '1', 'App\\Models\\Admin', '1', '{\"attributes\":{\"status\":\"RETURNED\",\"status_at\":\"2026-01-20T16:44:27.000000Z\"},\"old\":{\"status\":\"DELIVERED\",\"status_at\":\"2026-01-20T16:44:11.000000Z\"}}', '2026-01-20 16:44:27', '2026-01-20 16:44:27', 'updated', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('7', 'orders', 'The order #1 has been updated', 'App\\Models\\Order', '1', 'App\\Models\\Admin', '1', '{\"attributes\":{\"status\":\"CANCELLED\",\"status_at\":\"2026-01-20T16:44:37.000000Z\"},\"old\":{\"status\":\"RETURNED\",\"status_at\":\"2026-01-20T16:44:27.000000Z\"}}', '2026-01-20 16:44:37', '2026-01-20 16:44:37', 'updated', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('8', 'orders', 'The order #3 has been created', 'App\\Models\\Order', '3', NULL, NULL, '{\"attributes\":{\"admin_id\":1,\"name\":\"Suriya Rahman\",\"phone\":\"+8801767934747\",\"address\":\"8919 145th street\",\"status\":\"PENDING\",\"status_at\":\"2026-01-21T00:09:02.000000Z\",\"products\":{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":1,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":3,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":2997,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}},\"note\":null,\"data\":{\"courier\":\"Other\",\"advanced\":0,\"discount\":0,\"shipping_cost\":130,\"subtotal\":\"999\",\"packaging_charge\":25}}}', '2026-01-21 00:09:02', '2026-01-21 00:09:02', 'created', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('9', 'orders', 'The order #4 has been created', 'App\\Models\\Order', '4', NULL, NULL, '{\"attributes\":{\"admin_id\":1,\"name\":\"Suriya Rahman\",\"phone\":\"+8801777777777\",\"address\":\"8919 145th street\",\"status\":\"PENDING\",\"status_at\":\"2026-01-22T10:19:46.000000Z\",\"products\":{\"1\":{\"id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"price\":999,\"retail_price\":999,\"quantity\":1,\"options\":{\"id\":1,\"source_id\":null,\"parent_id\":1,\"name\":\"Non-Stick Electric Rice Cooker\",\"slug\":\"non-stick-electric-rice-cooker\",\"sku\":\"V6CW2MF8U\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/19-Jan-2026\\/images\\/1768846928-nonstick-cooker.png\",\"category\":\"Home Appliance\",\"quantity\":1,\"price\":999,\"purchase_price\":645,\"retail_price\":999,\"total\":999,\"shipping_inside\":80,\"shipping_outside\":130,\"max\":3}}},\"note\":null,\"data\":{\"courier\":\"Other\",\"advanced\":0,\"discount\":0,\"shipping_cost\":130,\"subtotal\":\"999\",\"packaging_charge\":25}}}', '2026-01-22 10:19:46', '2026-01-22 10:19:46', 'created', NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `event`, `batch_uuid`) VALUES ('10', 'orders', 'The order #1 has been updated', 'App\\Models\\Order', '1', 'App\\Models\\Admin', '1', '{\"attributes\":{\"status\":\"DELIVERED\",\"status_at\":\"2026-01-23T13:16:49.000000Z\"},\"old\":{\"status\":\"CANCELLED\",\"status_at\":\"2026-01-20T16:44:37.000000Z\"}}', '2026-01-23 13:16:49', '2026-01-23 13:16:49', 'updated', NULL);

-- Table: sessions
TRUNCATE TABLE `sessions`;
INSERT INTO `sessions` (`id`, `userable_type`, `userable_id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('8rX868T7VbEtaGKzjSXhWOVjEZTyPlKgpeaeux69', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiZGswN2oycEoxcUFDRjV0Rm1hOU5oSmM3QXN1WUpuMUVKYW5GVGhBMyI7czo0OiJrYXJ0IjtzOjc6ImRlZmF1bHQiO3M6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YToxOntpOjA7czoxNzoiTGFyYXZlbF9tZXRhUGl4ZWwiO319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy9tdWx0aXB1cnBvc2Utamh1cnkiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjM6InVybCI7YTowOnt9czo0OiJjYXJ0IjthOjA6e31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czoxNzoiTGFyYXZlbF9tZXRhUGl4ZWwiO2E6MDp7fX0=', '1769290238');
INSERT INTO `sessions` (`id`, `userable_type`, `userable_id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('tFmwBEJd4RYqZHWDF7c3jGm1KD8lAR1ouGCaMHR9', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibnMxcGNTem9EMWhhTHJKZ0V3Rlg1dWNOZG5KQWdXa3JtZzkyOUhWWiI7czo0OiJrYXJ0IjtzOjc6ImRlZmF1bHQiO3M6MTc6IkxhcmF2ZWxfbWV0YVBpeGVsIjthOjA6e31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6MTc6IkxhcmF2ZWxfbWV0YVBpeGVsIjt9fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO3M6NToicm91dGUiO3M6MToiLyI7fX0=', '1769371536');
INSERT INTO `sessions` (`id`, `userable_type`, `userable_id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('tTjCTbTnvYyRVSSpiou3t67fZGcbPXWfzl8XxFur', NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRzNsZmpvcXBCQjhRVUIwT0RuU1Y0U25FNkdLaVdxU01tNVcySGFBbiI7czo0OiJrYXJ0IjtzOjc6ImRlZmF1bHQiO3M6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YToxOntpOjA7czoxNzoiTGFyYXZlbF9tZXRhUGl4ZWwiO319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy9zdG9uZS1jbGVhbmVyIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czozOiJ1cmwiO2E6MDp7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJMYXJhdmVsX21ldGFQaXhlbCI7YTowOnt9fQ==', '1769373037');

-- Table: categories
TRUNCATE TABLE `categories`;
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`, `order`, `image_id`, `source_id`, `is_enabled`) VALUES ('1', NULL, 'Home Appliance', 'home-appliance', '2026-01-19 18:23:49', '2026-01-19 18:23:49', '0', NULL, NULL, '1');
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`, `order`, `image_id`, `source_id`, `is_enabled`) VALUES ('2', NULL, 'Gadgets & Electronics', 'gadgets-and-electronics', '2026-01-23 14:59:07', '2026-01-23 14:59:07', '0', NULL, NULL, '1');
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`, `order`, `image_id`, `source_id`, `is_enabled`) VALUES ('3', NULL, 'Cleaning Supplies', 'cleaning-supplies', '2026-01-23 15:00:15', '2026-01-23 15:00:15', '0', NULL, NULL, '1');
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`, `order`, `image_id`, `source_id`, `is_enabled`) VALUES ('4', NULL, 'Health & Beauty', 'health-and-beauty', '2026-01-23 15:01:50', '2026-01-23 15:01:50', '0', NULL, NULL, '1');
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`, `order`, `image_id`, `source_id`, `is_enabled`) VALUES ('5', NULL, 'Fashion & Lifestyle', 'fashion-and-lifestyle', '2026-01-23 15:02:22', '2026-01-23 15:02:22', '0', NULL, NULL, '1');
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`, `order`, `image_id`, `source_id`, `is_enabled`) VALUES ('6', NULL, 'Kids & Toys', 'kids-and-toys', '2026-01-23 16:45:50', '2026-01-23 16:45:50', '0', NULL, NULL, '1');

-- Table: cache
TRUNCATE TABLE `cache`;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:logo', 'O:8:\"stdClass\":4:{s:7:\"desktop\";s:47:\"/storage/19-Jan-2026/logo/1768845845-logopn.png\";s:6:\"mobile\";s:47:\"/storage/19-Jan-2026/logo/1768845845-logopn.png\";s:5:\"login\";s:47:\"/storage/19-Jan-2026/logo/1768845845-logopn.png\";s:7:\"favicon\";s:44:\"/storage/19-Jan-2026/logo/1768845845-fav.png\";}', '2084732240');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:company', 'O:8:\"stdClass\":12:{s:4:\"name\";s:14:\"Smart Bazar BD\";s:12:\"contact_name\";s:14:\"+8801339387279\";s:5:\"email\";s:23:\"admin@smartbazaarbd.xyz\";s:5:\"phone\";s:14:\"+8801339387279\";s:8:\"whatsapp\";s:14:\"+8801339387279\";s:7:\"tagline\";s:18:\"Upgrade Your Life!\";s:7:\"address\";s:26:\"Mirpur, Dhaka, Bangladesh.\";s:11:\"office_time\";s:8:\"Everyday\";s:9:\"messenger\";s:13:\"https://m.me/\";s:10:\"gmap_ecode\";N;s:8:\"dev_name\";N;s:8:\"dev_link\";N;}', '2084732240');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:gtm_id', 'N;', '2084733036');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:pixel_ids', 's:0:\"\";', '2084732244');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings', 'a:19:{s:7:\"company\";O:8:\"stdClass\":12:{s:4:\"name\";s:14:\"Smart Bazar BD\";s:12:\"contact_name\";s:14:\"+8801339387279\";s:5:\"email\";s:23:\"admin@smartbazaarbd.xyz\";s:5:\"phone\";s:14:\"+8801339387279\";s:8:\"whatsapp\";s:14:\"+8801339387279\";s:7:\"tagline\";s:18:\"Upgrade Your Life!\";s:7:\"address\";s:26:\"Mirpur, Dhaka, Bangladesh.\";s:11:\"office_time\";s:8:\"Everyday\";s:9:\"messenger\";s:13:\"https://m.me/\";s:10:\"gmap_ecode\";N;s:8:\"dev_name\";N;s:8:\"dev_link\";N;}s:14:\"call_for_order\";s:14:\"+8801339387279\";s:6:\"social\";O:8:\"stdClass\":4:{s:8:\"facebook\";O:8:\"stdClass\":1:{s:4:\"link\";N;}s:7:\"twitter\";O:8:\"stdClass\":1:{s:4:\"link\";N;}s:9:\"instagram\";O:8:\"stdClass\":1:{s:4:\"link\";N;}s:7:\"youtube\";O:8:\"stdClass\":1:{s:4:\"link\";N;}}s:4:\"logo\";O:8:\"stdClass\":4:{s:7:\"desktop\";s:47:\"/storage/19-Jan-2026/logo/1768845845-logopn.png\";s:6:\"mobile\";s:47:\"/storage/19-Jan-2026/logo/1768845845-logopn.png\";s:5:\"login\";s:47:\"/storage/19-Jan-2026/logo/1768845845-logopn.png\";s:7:\"favicon\";s:44:\"/storage/19-Jan-2026/logo/1768845845-fav.png\";}s:15:\"delivery_charge\";O:8:\"stdClass\":2:{s:12:\"inside_dhaka\";s:2:\"80\";s:13:\"outside_dhaka\";s:3:\"130\";}s:13:\"delivery_text\";N;s:13:\"free_delivery\";O:8:\"stdClass\":4:{s:7:\"enabled\";s:1:\"0\";s:7:\"for_all\";s:1:\"0\";s:12:\"min_quantity\";s:1:\"1\";s:10:\"min_amount\";s:1:\"1\";}s:12:\"default_area\";O:8:\"stdClass\":2:{s:6:\"inside\";s:1:\"0\";s:7:\"outside\";s:1:\"0\";}s:11:\"show_option\";O:8:\"stdClass\":25:{s:27:\"productwise_delivery_charge\";s:1:\"1\";s:28:\"quantitywise_delivery_charge\";s:1:\"0\";s:14:\"customer_login\";s:1:\"1\";s:17:\"category_dropdown\";s:1:\"1\";s:17:\"category_carousel\";s:1:\"0\";s:19:\"product_grid_button\";s:9:\"order_now\";s:16:\"add_to_cart_text\";s:11:\"Add to Cart\";s:16:\"add_to_cart_icon\";s:32:\"<i class=\"fas fa-cart-plus\"></i>\";s:14:\"order_now_text\";s:9:\"Order Now\";s:14:\"order_now_icon\";s:35:\"<i class=\"fas fa-shopping-bag\"></i>\";s:19:\"guest_can_see_price\";s:1:\"1\";s:20:\"checkout_button_text\";s:13:\"Confirm Order\";s:12:\"product_sort\";s:6:\"random\";s:17:\"checkout_template\";s:6:\"simple\";s:29:\"product_detail_buttons_inline\";s:2:\"on\";s:26:\"product_detail_add_to_cart\";s:1:\"1\";s:24:\"product_detail_order_now\";s:1:\"1\";s:17:\"invoices_per_page\";s:1:\"3\";s:14:\"invoice_prefix\";N;s:12:\"topbar_phone\";s:1:\"0\";s:11:\"track_order\";s:1:\"0\";s:17:\"hide_phone_prefix\";s:1:\"0\";s:18:\"hide_checkout_note\";s:1:\"0\";s:18:\"hide_invoice_image\";s:1:\"0\";s:18:\"show_others_orders\";s:1:\"0\";}s:13:\"products_page\";O:8:\"stdClass\":2:{s:4:\"rows\";s:1:\"3\";s:4:\"cols\";s:1:\"5\";}s:16:\"related_products\";O:8:\"stdClass\":2:{s:4:\"rows\";s:1:\"1\";s:4:\"cols\";s:1:\"5\";}s:11:\"scroll_text\";N;s:13:\"discount_text\";N;s:8:\"services\";O:8:\"stdClass\":5:{s:7:\"enabled\";s:1:\"0\";s:3:\"one\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}s:3:\"two\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}s:5:\"three\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}s:4:\"four\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}}s:5:\"color\";O:8:\"stdClass\":11:{s:6:\"topbar\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#4A1B87\";s:16:\"background_hover\";s:7:\"#3A156B\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:6:\"header\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#5B22A5\";s:16:\"background_hover\";s:7:\"#5B22A5\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:6:\"search\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#FFFFFF\";s:16:\"background_hover\";s:7:\"#FFFFFF\";s:10:\"text_color\";s:7:\"#5B22A5\";s:10:\"text_hover\";s:7:\"#5B22A5\";}s:6:\"navbar\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#5B22A5\";s:16:\"background_hover\";s:7:\"#4A1B87\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:13:\"category_menu\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#FFFFFF\";s:16:\"background_hover\";s:7:\"#F8F4FF\";s:10:\"text_color\";s:7:\"#5B22A5\";s:10:\"text_hover\";s:7:\"#4A1B87\";}s:7:\"section\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#FFFFFF\";s:16:\"background_hover\";s:7:\"#FFFFFF\";s:10:\"text_color\";s:7:\"#5B22A5\";s:10:\"text_hover\";s:7:\"#4A1B87\";}s:5:\"badge\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#5B22A5\";s:16:\"background_hover\";s:7:\"#4A1B87\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:6:\"footer\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#5B22A5\";s:16:\"background_hover\";s:7:\"#4A1B87\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:7:\"primary\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#5B22A5\";s:16:\"background_hover\";s:7:\"#4A1B87\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:11:\"add_to_cart\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#FFFFFF\";s:16:\"background_hover\";s:7:\"#5B22A5\";s:10:\"text_color\";s:7:\"#5B22A5\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}s:9:\"order_now\";O:8:\"stdClass\":4:{s:16:\"background_color\";s:7:\"#5B22A5\";s:16:\"background_hover\";s:7:\"#4A1B87\";s:10:\"text_color\";s:7:\"#FFFFFF\";s:10:\"text_hover\";s:7:\"#FFFFFF\";}}s:6:\"Pathao\";O:8:\"stdClass\":7:{s:7:\"enabled\";s:1:\"0\";s:8:\"store_id\";N;s:22:\"user_selects_city_area\";s:1:\"0\";s:8:\"username\";s:21:\"admin@smartbazaar.com\";s:8:\"password\";s:8:\"@123321!\";s:9:\"client_id\";N;s:13:\"client_secret\";N;}s:5:\"fraud\";O:8:\"stdClass\":3:{s:14:\"allow_per_hour\";N;s:13:\"allow_per_day\";N;s:19:\"max_qty_per_product\";N;}s:12:\"SMSTemplates\";O:8:\"stdClass\":2:{s:3:\"otp\";s:19:\"Your OTP is: [code]\";s:12:\"confirmation\";s:31:\"Order confirmed. Order ID: [id]\";}s:9:\"SteadFast\";O:8:\"stdClass\":3:{s:7:\"enabled\";s:1:\"0\";s:3:\"key\";N;s:6:\"secret\";N;}}', '2084732244');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:services', 'O:8:\"stdClass\":5:{s:7:\"enabled\";s:1:\"0\";s:3:\"one\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}s:3:\"two\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}s:5:\"three\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}s:4:\"four\";O:8:\"stdClass\":2:{s:5:\"title\";N;s:6:\"detail\";N;}}', '2084732244');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:fraud', 'O:8:\"stdClass\":3:{s:14:\"allow_per_hour\";N;s:13:\"allow_per_day\";N;s:19:\"max_qty_per_product\";N;}', '2084732244');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:free_delivery', 'O:8:\"stdClass\":4:{s:7:\"enabled\";s:1:\"0\";s:7:\"for_all\";s:1:\"0\";s:12:\"min_quantity\";s:1:\"1\";s:10:\"min_amount\";s:1:\"1\";}', '2084732244');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:show_option', 'O:8:\"stdClass\":25:{s:27:\"productwise_delivery_charge\";s:1:\"1\";s:28:\"quantitywise_delivery_charge\";s:1:\"0\";s:14:\"customer_login\";s:1:\"1\";s:17:\"category_dropdown\";s:1:\"1\";s:17:\"category_carousel\";s:1:\"0\";s:19:\"product_grid_button\";s:9:\"order_now\";s:16:\"add_to_cart_text\";s:11:\"Add to Cart\";s:16:\"add_to_cart_icon\";s:32:\"<i class=\"fas fa-cart-plus\"></i>\";s:14:\"order_now_text\";s:9:\"Order Now\";s:14:\"order_now_icon\";s:35:\"<i class=\"fas fa-shopping-bag\"></i>\";s:19:\"guest_can_see_price\";s:1:\"1\";s:20:\"checkout_button_text\";s:13:\"Confirm Order\";s:12:\"product_sort\";s:6:\"random\";s:17:\"checkout_template\";s:6:\"simple\";s:29:\"product_detail_buttons_inline\";s:2:\"on\";s:26:\"product_detail_add_to_cart\";s:1:\"1\";s:24:\"product_detail_order_now\";s:1:\"1\";s:17:\"invoices_per_page\";s:1:\"3\";s:14:\"invoice_prefix\";N;s:12:\"topbar_phone\";s:1:\"0\";s:11:\"track_order\";s:1:\"0\";s:17:\"hide_phone_prefix\";s:1:\"0\";s:18:\"hide_checkout_note\";s:1:\"0\";s:18:\"hide_invoice_image\";s:1:\"0\";s:18:\"show_others_orders\";s:1:\"0\";}', '2084732244');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:call_for_order', 's:14:\"+8801339387279\";', '2084732245');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:delivery_text', 'N;', '2084732245');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:related_products', 'O:8:\"stdClass\":2:{s:4:\"rows\";s:1:\"1\";s:4:\"cols\";s:1:\"5\";}', '2084732245');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('settings:discount_text', 'N;', '2084733036');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('menus:header-menu', 'TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9', '2084732245');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('menus:topbar-menu', 'TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9', '2084732245');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('menus:quick-links', 'TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9', '2084732245');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('slides', 'TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fQ==', '2084732251');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('homesections', 'TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e2k6MDtPOjIyOiJBcHBcTW9kZWxzXEhvbWVTZWN0aW9uIjozMzp7czoxMzoiACoAY29ubmVjdGlvbiI7czo2OiJzcWxpdGUiO3M6ODoiACoAdGFibGUiO3M6MTM6ImhvbWVfc2VjdGlvbnMiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MTp7aTowO3M6MTA6ImNhdGVnb3JpZXMiO31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6ODp7czoyOiJpZCI7aToxO3M6NToidGl0bGUiO3M6MTI6IkhvdCBTZWxsaW5nISI7czo0OiJ0eXBlIjtzOjEzOiJjYXJvdXNlbC1ncmlkIjtzOjU6Im9yZGVyIjtpOjE7czo0OiJkYXRhIjtzOjQzOiJ7InJvd3MiOiIxIiwiY29scyI6IjUiLCJzb3VyY2UiOiJzcGVjaWZpYyJ9IjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI2LTAxLTE5IDE5OjI5OjAxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI2LTAxLTI0IDEzOjAyOjQ1IjtzOjU6Iml0ZW1zIjtzOjU6IlsiMSJdIjt9czoxMToiACoAb3JpZ2luYWwiO2E6ODp7czoyOiJpZCI7aToxO3M6NToidGl0bGUiO3M6MTI6IkhvdCBTZWxsaW5nISI7czo0OiJ0eXBlIjtzOjEzOiJjYXJvdXNlbC1ncmlkIjtzOjU6Im9yZGVyIjtpOjE7czo0OiJkYXRhIjtzOjQzOiJ7InJvd3MiOiIxIiwiY29scyI6IjUiLCJzb3VyY2UiOiJzcGVjaWZpYyJ9IjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI2LTAxLTE5IDE5OjI5OjAxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI2LTAxLTI0IDEzOjAyOjQ1IjtzOjU6Iml0ZW1zIjtzOjU6IlsiMSJdIjt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czoxMToiACoAcHJldmlvdXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6Mjp7czo1OiJpdGVtcyI7czo1OiJhcnJheSI7czo0OiJkYXRhIjtzOjY6Im9iamVjdCI7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YToxOntzOjEwOiJjYXRlZ29yaWVzIjtPOjM5OiJJbGx1bWluYXRlXERhdGFiYXNlXEVsb3F1ZW50XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7aTowO086MTk6IkFwcFxNb2RlbHNcQ2F0ZWdvcnkiOjMzOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjY6InNxbGl0ZSI7czo4OiIAKgB0YWJsZSI7czoxMDoiY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjEwOntzOjI6ImlkIjtpOjE7czo5OiJwYXJlbnRfaWQiO047czo0OiJuYW1lIjtzOjE0OiJIb21lIEFwcGxpYW5jZSI7czo0OiJzbHVnIjtzOjE0OiJob21lLWFwcGxpYW5jZSI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNi0wMS0xOSAxODoyMzo0OSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNi0wMS0xOSAxODoyMzo0OSI7czo1OiJvcmRlciI7aTowO3M6ODoiaW1hZ2VfaWQiO047czo5OiJzb3VyY2VfaWQiO047czoxMDoiaXNfZW5hYmxlZCI7aToxO31zOjExOiIAKgBvcmlnaW5hbCI7YToxMjp7czoyOiJpZCI7aToxO3M6OToicGFyZW50X2lkIjtOO3M6NDoibmFtZSI7czoxNDoiSG9tZSBBcHBsaWFuY2UiO3M6NDoic2x1ZyI7czoxNDoiaG9tZS1hcHBsaWFuY2UiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDEtMTkgMTg6MjM6NDkiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDEtMTkgMTg6MjM6NDkiO3M6NToib3JkZXIiO2k6MDtzOjg6ImltYWdlX2lkIjtOO3M6OToic291cmNlX2lkIjtOO3M6MTA6ImlzX2VuYWJsZWQiO2k6MTtzOjIxOiJwaXZvdF9ob21lX3NlY3Rpb25faWQiO2k6MTtzOjE3OiJwaXZvdF9jYXRlZ29yeV9pZCI7aToxO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjExOiIAKgBwcmV2aW91cyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjE6e3M6NToicGl2b3QiO086NDQ6IklsbHVtaW5hdGVcRGF0YWJhc2VcRWxvcXVlbnRcUmVsYXRpb25zXFBpdm90IjozNzp7czoxMzoiACoAY29ubmVjdGlvbiI7TjtzOjg6IgAqAHRhYmxlIjtzOjIxOiJjYXRlZ29yeV9ob21lX3NlY3Rpb24iO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MDtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToyOntzOjE1OiJob21lX3NlY3Rpb25faWQiO2k6MTtzOjExOiJjYXRlZ29yeV9pZCI7aToxO31zOjExOiIAKgBvcmlnaW5hbCI7YToyOntzOjE1OiJob21lX3NlY3Rpb25faWQiO2k6MTtzOjExOiJjYXRlZ29yeV9pZCI7aToxO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjExOiIAKgBwcmV2aW91cyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjI3OiIAKgByZWxhdGlvbkF1dG9sb2FkQ2FsbGJhY2siO047czoyNjoiACoAcmVsYXRpb25BdXRvbG9hZENvbnRleHQiO047czoxMDoidGltZXN0YW1wcyI7YjowO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MDp7fXM6MTE6InBpdm90UGFyZW50IjtPOjIyOiJBcHBcTW9kZWxzXEhvbWVTZWN0aW9uIjozMzp7czoxMzoiACoAY29ubmVjdGlvbiI7TjtzOjg6IgAqAHRhYmxlIjtzOjEzOiJob21lX3NlY3Rpb25zIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjE6e2k6MDtzOjEwOiJjYXRlZ29yaWVzIjt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjowO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjA6e31zOjExOiIAKgBvcmlnaW5hbCI7YTowOnt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czoxMToiACoAcHJldmlvdXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6Mjp7czo1OiJpdGVtcyI7czo1OiJhcnJheSI7czo0OiJkYXRhIjtzOjY6Im9iamVjdCI7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoyNzoiACoAcmVsYXRpb25BdXRvbG9hZENhbGxiYWNrIjtOO3M6MjY6IgAqAHJlbGF0aW9uQXV0b2xvYWRDb250ZXh0IjtOO3M6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjEzOiJ1c2VzVW5pcXVlSWRzIjtiOjA7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjU6e2k6MDtzOjU6InRpdGxlIjtpOjE7czo0OiJ0eXBlIjtpOjI7czo1OiJpdGVtcyI7aTozO3M6NToib3JkZXIiO2k6NDtzOjQ6ImRhdGEiO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO319czoxMjoicGl2b3RSZWxhdGVkIjtPOjE5OiJBcHBcTW9kZWxzXENhdGVnb3J5IjozMzp7czoxMzoiACoAY29ubmVjdGlvbiI7TjtzOjg6IgAqAHRhYmxlIjtOO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MDtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YTowOnt9czoxMToiACoAb3JpZ2luYWwiO2E6MDp7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6MTE6IgAqAHByZXZpb3VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6Mjc6IgAqAHJlbGF0aW9uQXV0b2xvYWRDYWxsYmFjayI7TjtzOjI2OiIAKgByZWxhdGlvbkF1dG9sb2FkQ29udGV4dCI7TjtzOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo2OntpOjA7czo5OiJwYXJlbnRfaWQiO2k6MTtzOjg6ImltYWdlX2lkIjtpOjI7czo0OiJuYW1lIjtpOjM7czo0OiJzbHVnIjtpOjQ7czo1OiJvcmRlciI7aTo1O3M6MTA6ImlzX2VuYWJsZWQiO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO319czoxMzoiACoAZm9yZWlnbktleSI7czoxNToiaG9tZV9zZWN0aW9uX2lkIjtzOjEzOiIAKgByZWxhdGVkS2V5IjtzOjExOiJjYXRlZ29yeV9pZCI7fX1zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjI3OiIAKgByZWxhdGlvbkF1dG9sb2FkQ2FsbGJhY2siO047czoyNjoiACoAcmVsYXRpb25BdXRvbG9hZENvbnRleHQiO047czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6Njp7aTowO3M6OToicGFyZW50X2lkIjtpOjE7czo4OiJpbWFnZV9pZCI7aToyO3M6NDoibmFtZSI7aTozO3M6NDoic2x1ZyI7aTo0O3M6NToib3JkZXIiO2k6NTtzOjEwOiJpc19lbmFibGVkIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjI3OiIAKgByZWxhdGlvbkF1dG9sb2FkQ2FsbGJhY2siO047czoyNjoiACoAcmVsYXRpb25BdXRvbG9hZENvbnRleHQiO047czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NTp7aTowO3M6NToidGl0bGUiO2k6MTtzOjQ6InR5cGUiO2k6MjtzOjU6Iml0ZW1zIjtpOjM7czo1OiJvcmRlciI7aTo0O3M6NDoiZGF0YSI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO30=', '2084732251');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('admin_staffs_online_offline', 'YToyOntzOjY6Im9ubGluZSI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo3OiJvZmZsaW5lIjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6Mjp7czo4OiIAKgBpdGVtcyI7YToxOntpOjA7Tzo4OiJzdGRDbGFzcyI6MTE6e3M6MjoiaWQiO2k6MTtzOjQ6Im5hbWUiO3M6NDoiRW1vbiI7czo1OiJlbWFpbCI7czoyMToiYWRtaW5Ac21hcnRiYXphYXIuY29tIjtzOjE3OiJlbWFpbF92ZXJpZmllZF9hdCI7TjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTIkVHRSbFFHbE9aMk1VM1kzWGNQc0JWZTNsREV3bG0yaHZCUjVGOVZOOVVSSVBVMENaTzIyYmUiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtzOjYwOiI4RTBJVVBETGpvaXNTaXFvTThIRU5XSzFoNWVqQ3pCcU5KSW1MdzllbUdkV0FjdUVTdTdXN1lJdTNzelciO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDEtMTggMjM6MTM6MzQiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDEtMjIgMTA6MTk6NDYiO3M6Nzoicm9sZV9pZCI7aTowO3M6OToiaXNfYWN0aXZlIjtpOjE7czoyMjoibGFzdF9vcmRlcl9yZWNlaXZlZF9hdCI7czoxOToiMjAyNi0wMS0yMiAxMDoxOTo0NiI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX0=', '1769372322');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('admin_products_count', 'i:11;', '1769372562');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('admin_inactive_products', 'TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fQ==', '1769372562');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('admin_low_stock_products', 'TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fQ==', '1769372562');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('pending_withdrawal_amount', 'i:0;', '1769372562');

-- Table: shopping_cart
TRUNCATE TABLE `shopping_cart`;
INSERT INTO `shopping_cart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`, `name`, `phone`) VALUES ('7VGmENbth1OIycoslVYE9bbJysYybOkEIDxYQJEB', 'default', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:1;O:29:\"Azmolla\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"83fee3bc988ca25d43fa599f9df8d5a7\";s:2:\"id\";i:1;s:3:\"qty\";i:1;s:4:\"name\";s:30:\"Non-Stick Electric Rice Cooker\";s:5:\"price\";d:999;s:7:\"options\";O:36:\"Azmolla\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:16:{s:2:\"id\";i:1;s:9:\"source_id\";N;s:9:\"parent_id\";i:1;s:4:\"name\";s:30:\"Non-Stick Electric Rice Cooker\";s:4:\"slug\";s:30:\"non-stick-electric-rice-cooker\";s:3:\"sku\";s:9:\"V6CW2MF8U\";s:5:\"image\";s:79:\"http://localhost:8000/storage/19-Jan-2026/images/1768846928-nonstick-cooker.png\";s:8:\"category\";s:14:\"Home Appliance\";s:8:\"quantity\";i:1;s:5:\"price\";i:999;s:14:\"purchase_price\";i:645;s:12:\"retail_price\";i:1399;s:5:\"total\";i:999;s:15:\"shipping_inside\";i:80;s:16:\"shipping_outside\";i:130;s:3:\"max\";i:3;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:46:\"\0Azmolla\\Shoppingcart\\CartItem\0associatedModel\";N;s:38:\"\0Azmolla\\Shoppingcart\\CartItem\0taxRate\";i:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', NULL, '2026-01-23 11:41:47', 'Test User', '+8801700000000');

-- Table: seo
TRUNCATE TABLE `seo`;
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('1', 'App\\Models\\Category', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-19 18:23:49', '2026-01-19 18:23:49');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('2', 'App\\Models\\Product', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-19 19:24:19', '2026-01-19 19:24:19');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('4', 'App\\Models\\Category', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 14:59:07', '2026-01-23 14:59:07');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('5', 'App\\Models\\Category', '3', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 15:00:15', '2026-01-23 15:00:15');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('6', 'App\\Models\\Category', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 15:01:50', '2026-01-23 15:01:50');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('7', 'App\\Models\\Category', '5', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 15:02:23', '2026-01-23 15:02:23');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('8', 'App\\Models\\Product', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 15:30:57', '2026-01-23 15:30:57');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('9', 'App\\Models\\Product', '3', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 15:39:20', '2026-01-23 15:39:20');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('10', 'App\\Models\\Product', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 15:48:32', '2026-01-23 15:48:32');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('11', 'App\\Models\\Product', '5', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:05:06', '2026-01-23 16:05:06');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('12', 'App\\Models\\Product', '6', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:22:44', '2026-01-23 16:22:44');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('13', 'App\\Models\\Product', '7', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:28:17', '2026-01-23 16:28:17');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('14', 'App\\Models\\Product', '8', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:42:43', '2026-01-23 16:42:43');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('15', 'App\\Models\\Category', '6', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:45:51', '2026-01-23 16:45:51');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('16', 'App\\Models\\Product', '9', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:47:42', '2026-01-23 16:47:42');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('17', 'App\\Models\\Product', '10', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 16:52:40', '2026-01-23 16:52:40');
INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES ('18', 'App\\Models\\Product', '11', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 17:13:09', '2026-01-23 17:13:09');

-- Table: districts
TRUNCATE TABLE `districts`;
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('1', 'Bagerhat', 'Bagerhat', '2026-01-20 23:55:07', '2026-01-20 23:55:07');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('2', 'Bandarban', 'Bandarban', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('3', 'Barguna', 'Barguna', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('4', 'Barishal', 'Barishal', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('5', 'Bhola', 'Bhola', '2026-01-20 23:55:13', '2026-01-20 23:55:13');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('6', 'Bogura', 'Bogura', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('7', 'Brahmanbaria', 'Brahmanbaria', '2026-01-20 23:55:16', '2026-01-20 23:55:16');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('8', 'Chandpur', 'Chandpur', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('9', 'Chapainawabganj', 'Chapainawabganj', '2026-01-20 23:55:19', '2026-01-20 23:55:19');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('10', 'Chattogram', 'Chattogram', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('11', 'Chuadanga', 'Chuadanga', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('12', 'Comilla', 'Comilla', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('13', 'Cox\'s Bazar', 'Cox\'s Bazar', '2026-01-20 23:55:27', '2026-01-20 23:55:27');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('14', 'Dhaka', 'Dhaka', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('15', 'Dinajpur', 'Dinajpur', '2026-01-20 23:55:36', '2026-01-20 23:55:36');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('16', 'Faridpur', 'Faridpur', '2026-01-20 23:55:38', '2026-01-20 23:55:38');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('17', 'Feni', 'Feni', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('18', 'Gaibandha', 'Gaibandha', '2026-01-20 23:55:40', '2026-01-20 23:55:40');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('19', 'Gazipur', 'Gazipur', '2026-01-20 23:55:42', '2026-01-20 23:55:42');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('20', 'Gopalganj', 'Gopalganj', '2026-01-20 23:55:43', '2026-01-20 23:55:43');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('21', 'Habiganj', 'Habiganj', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('22', 'Jamalpur', 'Jamalpur', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('23', 'Jashore', 'Jashore', '2026-01-20 23:55:46', '2026-01-20 23:55:46');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('24', 'Jhalokati', 'Jhalokati', '2026-01-20 23:55:59', '2026-01-20 23:55:59');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('25', 'Jhenaidah', 'Jhenaidah', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('26', 'Joypurhat', 'Joypurhat', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('27', 'Khagrachhari', 'Khagrachhari', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('28', 'Khulna', 'Khulna', '2026-01-20 23:56:03', '2026-01-20 23:56:03');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('29', 'Kishoreganj', 'Kishoreganj', '2026-01-20 23:56:06', '2026-01-20 23:56:06');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('30', 'Kurigram', 'Kurigram', '2026-01-20 23:56:08', '2026-01-20 23:56:08');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('31', 'Kushtia', 'Kushtia', '2026-01-20 23:56:10', '2026-01-20 23:56:10');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('32', 'Lakshmipur', 'Lakshmipur', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('33', 'Lalmonirhat', 'Lalmonirhat', '2026-01-20 23:56:12', '2026-01-20 23:56:12');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('34', 'Madaripur', 'Madaripur', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('35', 'Magura', 'Magura', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('36', 'Manikganj', 'Manikganj', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('37', 'Meherpur', 'Meherpur', '2026-01-20 23:56:16', '2026-01-20 23:56:16');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('38', 'Moulvibazar', 'Moulvibazar', '2026-01-20 23:56:16', '2026-01-20 23:56:16');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('39', 'Munshiganj', 'Munshiganj', '2026-01-20 23:56:18', '2026-01-20 23:56:18');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('40', 'Mymensingh', 'Mymensingh', '2026-01-20 23:56:19', '2026-01-20 23:56:19');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('41', 'Naogaon', 'Naogaon', '2026-01-20 23:56:21', '2026-01-20 23:56:21');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('42', 'Narail', 'Narail', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('43', 'Narayanganj', 'Narayanganj', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('44', 'Narsingdi', 'Narsingdi', '2026-01-20 23:56:25', '2026-01-20 23:56:25');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('45', 'Natore', 'Natore', '2026-01-20 23:56:26', '2026-01-20 23:56:26');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('46', 'Netrokona', 'Netrokona', '2026-01-20 23:56:27', '2026-01-20 23:56:27');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('47', 'Nilphamari', 'Nilphamari', '2026-01-20 23:56:29', '2026-01-20 23:56:29');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('48', 'Noakhali', 'Noakhali', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('49', 'Pabna', 'Pabna', '2026-01-20 23:56:32', '2026-01-20 23:56:32');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('50', 'Panchagarh', 'Panchagarh', '2026-01-20 23:56:34', '2026-01-20 23:56:34');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('51', 'Patuakhali', 'Patuakhali', '2026-01-20 23:56:35', '2026-01-20 23:56:35');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('52', 'Pirojpur', 'Pirojpur', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('53', 'Rajbari', 'Rajbari', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('54', 'Rajshahi', 'Rajshahi', '2026-01-20 23:56:39', '2026-01-20 23:56:39');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('55', 'Rangamati', 'Rangamati', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('56', 'Rangpur', 'Rangpur', '2026-01-20 23:56:42', '2026-01-20 23:56:42');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('57', 'Satkhira', 'Satkhira', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('58', 'Shariatpur', 'Shariatpur', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('59', 'Sherpur', 'Sherpur', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('60', 'Sirajganj', 'Sirajganj', '2026-01-20 23:56:47', '2026-01-20 23:56:47');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('61', 'Sunamganj', 'Sunamganj', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('62', 'Sylhet', 'Sylhet', '2026-01-20 23:56:55', '2026-01-20 23:56:55');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('63', 'Tangail', 'Tangail', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `districts` (`id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('64', 'Thakurgaon', 'Thakurgaon', '2026-01-20 23:56:59', '2026-01-20 23:56:59');

-- Table: areas
TRUNCATE TABLE `areas`;
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('1', '1', 'Bagerhat Sadar', 'Bagerhat Sadar', '2026-01-20 23:55:08', '2026-01-20 23:55:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('2', '1', 'Chitalmari', 'Chitalmari', '2026-01-20 23:55:08', '2026-01-20 23:55:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('3', '1', 'Fakirhat', 'Fakirhat', '2026-01-20 23:55:08', '2026-01-20 23:55:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('4', '1', 'Kachua', 'Kachua', '2026-01-20 23:55:08', '2026-01-20 23:55:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('5', '1', 'Mollahat', 'Mollahat', '2026-01-20 23:55:08', '2026-01-20 23:55:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('6', '1', 'Mongla', 'Mongla', '2026-01-20 23:55:08', '2026-01-20 23:55:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('7', '1', 'Morrelganj', 'Morrelganj', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('8', '1', 'Rampal', 'Rampal', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('9', '1', 'Sarankhola', 'Sarankhola', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('10', '2', 'Bandarban Sadar', 'Bandarban Sadar', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('11', '2', 'Ali Kadam', 'Ali Kadam', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('12', '2', 'Lama', 'Lama', '2026-01-20 23:55:09', '2026-01-20 23:55:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('13', '2', 'Naikhongchhari', 'Naikhongchhari', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('14', '2', 'Rowangchhari', 'Rowangchhari', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('15', '2', 'Ruma', 'Ruma', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('16', '2', 'Thanchi', 'Thanchi', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('17', '3', 'Barguna Sadar', 'Barguna Sadar', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('18', '3', 'Amtali', 'Amtali', '2026-01-20 23:55:10', '2026-01-20 23:55:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('19', '3', 'Bamna', 'Bamna', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('20', '3', 'Betagi', 'Betagi', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('21', '3', 'Patharghata', 'Patharghata', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('22', '3', 'Taltali', 'Taltali', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('23', '4', 'Barishal Sadar', 'Barishal Sadar', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('24', '4', 'Agailjhara', 'Agailjhara', '2026-01-20 23:55:11', '2026-01-20 23:55:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('25', '4', 'Babuganj', 'Babuganj', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('26', '4', 'Bakerganj', 'Bakerganj', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('27', '4', 'Banaripara', 'Banaripara', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('28', '4', 'Gaurnadi', 'Gaurnadi', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('29', '4', 'Hizla', 'Hizla', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('30', '4', 'Mehendiganj', 'Mehendiganj', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('31', '4', 'Muladi', 'Muladi', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('32', '4', 'Wazirpur', 'Wazirpur', '2026-01-20 23:55:12', '2026-01-20 23:55:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('33', '5', 'Bhola Sadar', 'Bhola Sadar', '2026-01-20 23:55:13', '2026-01-20 23:55:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('34', '5', 'Burhanuddin', 'Burhanuddin', '2026-01-20 23:55:13', '2026-01-20 23:55:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('35', '5', 'Char Fasson', 'Char Fasson', '2026-01-20 23:55:13', '2026-01-20 23:55:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('36', '5', 'Daulatkhan', 'Daulatkhan', '2026-01-20 23:55:13', '2026-01-20 23:55:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('37', '5', 'Lalmohan', 'Lalmohan', '2026-01-20 23:55:13', '2026-01-20 23:55:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('38', '5', 'Manpura', 'Manpura', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('39', '5', 'Tazumuddin', 'Tazumuddin', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('40', '6', 'Bogura Sadar', 'Bogura Sadar', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('41', '6', 'Adamdighi', 'Adamdighi', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('42', '6', 'Dhunat', 'Dhunat', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('43', '6', 'Dhupchanchia', 'Dhupchanchia', '2026-01-20 23:55:14', '2026-01-20 23:55:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('44', '6', 'Gabtali', 'Gabtali', '2026-01-20 23:55:15', '2026-01-20 23:55:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('45', '6', 'Kahaloo', 'Kahaloo', '2026-01-20 23:55:15', '2026-01-20 23:55:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('46', '6', 'Nandigram', 'Nandigram', '2026-01-20 23:55:15', '2026-01-20 23:55:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('47', '6', 'Sariakandi', 'Sariakandi', '2026-01-20 23:55:15', '2026-01-20 23:55:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('48', '6', 'Shajahanpur', 'Shajahanpur', '2026-01-20 23:55:15', '2026-01-20 23:55:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('49', '6', 'Sherpur', 'Sherpur', '2026-01-20 23:55:15', '2026-01-20 23:55:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('50', '6', 'Shibganj', 'Shibganj', '2026-01-20 23:55:16', '2026-01-20 23:55:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('51', '6', 'Sonatala', 'Sonatala', '2026-01-20 23:55:16', '2026-01-20 23:55:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('52', '7', 'Brahmanbaria Sadar', 'Brahmanbaria Sadar', '2026-01-20 23:55:16', '2026-01-20 23:55:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('53', '7', 'Akhaura', 'Akhaura', '2026-01-20 23:55:16', '2026-01-20 23:55:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('54', '7', 'Ashuganj', 'Ashuganj', '2026-01-20 23:55:16', '2026-01-20 23:55:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('55', '7', 'Bancharampur', 'Bancharampur', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('56', '7', 'Bijoynagar', 'Bijoynagar', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('57', '7', 'Kasba', 'Kasba', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('58', '7', 'Nabinagar', 'Nabinagar', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('59', '7', 'Nasirnagar', 'Nasirnagar', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('60', '7', 'Sarail', 'Sarail', '2026-01-20 23:55:17', '2026-01-20 23:55:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('61', '8', 'Chandpur Sadar', 'Chandpur Sadar', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('62', '8', 'Faridganj', 'Faridganj', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('63', '8', 'Haimchar', 'Haimchar', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('64', '8', 'Haziganj', 'Haziganj', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('65', '8', 'Kachua', 'Kachua', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('66', '8', 'Matlab Dakshin', 'Matlab Dakshin', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('67', '8', 'Matlab Uttar', 'Matlab Uttar', '2026-01-20 23:55:18', '2026-01-20 23:55:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('68', '8', 'Shahrasti', 'Shahrasti', '2026-01-20 23:55:19', '2026-01-20 23:55:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('69', '9', 'Chapainawabganj Sadar', 'Chapainawabganj Sadar', '2026-01-20 23:55:19', '2026-01-20 23:55:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('70', '9', 'Bholahat', 'Bholahat', '2026-01-20 23:55:19', '2026-01-20 23:55:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('71', '9', 'Gomastapur', 'Gomastapur', '2026-01-20 23:55:19', '2026-01-20 23:55:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('72', '9', 'Nachole', 'Nachole', '2026-01-20 23:55:19', '2026-01-20 23:55:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('73', '9', 'Shibganj', 'Shibganj', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('74', '10', 'Agrabad', 'Agrabad', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('75', '10', 'Baizid', 'Baizid', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('76', '10', 'Bakalia', 'Bakalia', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('77', '10', 'Bandar', 'Bandar', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('78', '10', 'Chandgaon', 'Chandgaon', '2026-01-20 23:55:20', '2026-01-20 23:55:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('79', '10', 'Double Mooring', 'Double Mooring', '2026-01-20 23:55:21', '2026-01-20 23:55:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('80', '10', 'Halishahar', 'Halishahar', '2026-01-20 23:55:21', '2026-01-20 23:55:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('81', '10', 'Khulshi', 'Khulshi', '2026-01-20 23:55:21', '2026-01-20 23:55:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('82', '10', 'Kotwali', 'Kotwali', '2026-01-20 23:55:21', '2026-01-20 23:55:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('83', '10', 'Pahartali', 'Pahartali', '2026-01-20 23:55:21', '2026-01-20 23:55:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('84', '10', 'Panchlaish', 'Panchlaish', '2026-01-20 23:55:21', '2026-01-20 23:55:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('85', '10', 'Patenga', 'Patenga', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('86', '10', 'Chattogram Sadar', 'Chattogram Sadar', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('87', '10', 'Sitakunda', 'Sitakunda', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('88', '10', 'Mirsharai', 'Mirsharai', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('89', '10', 'Sandwip', 'Sandwip', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('90', '10', 'Fatikchhari', 'Fatikchhari', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('91', '10', 'Hathazari', 'Hathazari', '2026-01-20 23:55:22', '2026-01-20 23:55:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('92', '10', 'Raozan', 'Raozan', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('93', '10', 'Rangunia', 'Rangunia', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('94', '10', 'Boalkhali', 'Boalkhali', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('95', '10', 'Patiya', 'Patiya', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('96', '10', 'Anwara', 'Anwara', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('97', '10', 'Chandanaish', 'Chandanaish', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('98', '10', 'Satkania', 'Satkania', '2026-01-20 23:55:23', '2026-01-20 23:55:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('99', '10', 'Lohagara', 'Lohagara', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('100', '10', 'Banshkhali', 'Banshkhali', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('101', '11', 'Chuadanga Sadar', 'Chuadanga Sadar', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('102', '11', 'Alamdanga', 'Alamdanga', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('103', '11', 'Damurhuda', 'Damurhuda', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('104', '11', 'Jibannagar', 'Jibannagar', '2026-01-20 23:55:24', '2026-01-20 23:55:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('105', '12', 'Comilla Sadar', 'Comilla Sadar', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('106', '12', 'Barura', 'Barura', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('107', '12', 'Brahmanpara', 'Brahmanpara', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('108', '12', 'Burichang', 'Burichang', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('109', '12', 'Chandina', 'Chandina', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('110', '12', 'Chauddagram', 'Chauddagram', '2026-01-20 23:55:25', '2026-01-20 23:55:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('111', '12', 'Daudkandi', 'Daudkandi', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('112', '12', 'Debidwar', 'Debidwar', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('113', '12', 'Homna', 'Homna', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('114', '12', 'Laksam', 'Laksam', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('115', '12', 'Muradnagar', 'Muradnagar', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('116', '12', 'Nangalkot', 'Nangalkot', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('117', '12', 'Titas', 'Titas', '2026-01-20 23:55:26', '2026-01-20 23:55:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('118', '12', 'Monohargonj', 'Monohargonj', '2026-01-20 23:55:27', '2026-01-20 23:55:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('119', '12', 'Meghna', 'Meghna', '2026-01-20 23:55:27', '2026-01-20 23:55:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('120', '13', 'Cox\'s Bazar Sadar', 'Cox\'s Bazar Sadar', '2026-01-20 23:55:27', '2026-01-20 23:55:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('121', '13', 'Chakaria', 'Chakaria', '2026-01-20 23:55:27', '2026-01-20 23:55:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('122', '13', 'Kutubdia', 'Kutubdia', '2026-01-20 23:55:27', '2026-01-20 23:55:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('123', '13', 'Maheshkhali', 'Maheshkhali', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('124', '13', 'Pekua', 'Pekua', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('125', '13', 'Ramu', 'Ramu', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('126', '13', 'Teknaf', 'Teknaf', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('127', '13', 'Ukhiya', 'Ukhiya', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('128', '14', 'Adabor', 'Adabor', '2026-01-20 23:55:28', '2026-01-20 23:55:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('129', '14', 'Badda', 'Badda', '2026-01-20 23:55:29', '2026-01-20 23:55:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('130', '14', 'Bangshal', 'Bangshal', '2026-01-20 23:55:29', '2026-01-20 23:55:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('131', '14', 'Biman Bandar', 'Biman Bandar', '2026-01-20 23:55:29', '2026-01-20 23:55:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('132', '14', 'Cantonment', 'Cantonment', '2026-01-20 23:55:29', '2026-01-20 23:55:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('133', '14', 'Chawkbazar', 'Chawkbazar', '2026-01-20 23:55:29', '2026-01-20 23:55:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('134', '14', 'Dakshinkhan', 'Dakshinkhan', '2026-01-20 23:55:29', '2026-01-20 23:55:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('135', '14', 'Darus Salam', 'Darus Salam', '2026-01-20 23:55:30', '2026-01-20 23:55:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('136', '14', 'Demra', 'Demra', '2026-01-20 23:55:30', '2026-01-20 23:55:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('137', '14', 'Dhanmondi', 'Dhanmondi', '2026-01-20 23:55:30', '2026-01-20 23:55:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('138', '14', 'Gendaria', 'Gendaria', '2026-01-20 23:55:30', '2026-01-20 23:55:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('139', '14', 'Gulshan', 'Gulshan', '2026-01-20 23:55:30', '2026-01-20 23:55:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('140', '14', 'Hazaribagh', 'Hazaribagh', '2026-01-20 23:55:30', '2026-01-20 23:55:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('141', '14', 'Jatrabari', 'Jatrabari', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('142', '14', 'Kadamtali', 'Kadamtali', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('143', '14', 'Kafrul', 'Kafrul', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('144', '14', 'Kalabagan', 'Kalabagan', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('145', '14', 'Kamrangirchar', 'Kamrangirchar', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('146', '14', 'Khilgaon', 'Khilgaon', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('147', '14', 'Khilkhet', 'Khilkhet', '2026-01-20 23:55:31', '2026-01-20 23:55:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('148', '14', 'Kotwali', 'Kotwali', '2026-01-20 23:55:32', '2026-01-20 23:55:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('149', '14', 'Lalbagh', 'Lalbagh', '2026-01-20 23:55:32', '2026-01-20 23:55:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('150', '14', 'Mirpur', 'Mirpur', '2026-01-20 23:55:32', '2026-01-20 23:55:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('151', '14', 'Mohammadpur', 'Mohammadpur', '2026-01-20 23:55:32', '2026-01-20 23:55:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('152', '14', 'Motijheel', 'Motijheel', '2026-01-20 23:55:32', '2026-01-20 23:55:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('153', '14', 'New Market', 'New Market', '2026-01-20 23:55:32', '2026-01-20 23:55:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('154', '14', 'Pallabi', 'Pallabi', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('155', '14', 'Paltan', 'Paltan', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('156', '14', 'Ramna', 'Ramna', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('157', '14', 'Rampura', 'Rampura', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('158', '14', 'Sabujbagh', 'Sabujbagh', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('159', '14', 'Shah Ali', 'Shah Ali', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('160', '14', 'Shahbag', 'Shahbag', '2026-01-20 23:55:33', '2026-01-20 23:55:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('161', '14', 'Sher-e-Bangla Nagar', 'Sher-e-Bangla Nagar', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('162', '14', 'Shyampur', 'Shyampur', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('163', '14', 'Sutrapur', 'Sutrapur', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('164', '14', 'Tejgaon', 'Tejgaon', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('165', '14', 'Turag', 'Turag', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('166', '14', 'Uttara', 'Uttara', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('167', '14', 'Uttar Khan', 'Uttar Khan', '2026-01-20 23:55:34', '2026-01-20 23:55:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('168', '14', 'Vatara', 'Vatara', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('169', '14', 'Wari', 'Wari', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('170', '14', 'Savar', 'Savar', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('171', '14', 'Dhamrai', 'Dhamrai', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('172', '14', 'Keraniganj', 'Keraniganj', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('173', '14', 'Nawabganj', 'Nawabganj', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('174', '14', 'Dohar', 'Dohar', '2026-01-20 23:55:35', '2026-01-20 23:55:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('175', '15', 'Dinajpur Sadar', 'Dinajpur Sadar', '2026-01-20 23:55:36', '2026-01-20 23:55:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('176', '15', 'Birampur', 'Birampur', '2026-01-20 23:55:36', '2026-01-20 23:55:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('177', '15', 'Birganj', 'Birganj', '2026-01-20 23:55:36', '2026-01-20 23:55:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('178', '15', 'Bochaganj', 'Bochaganj', '2026-01-20 23:55:36', '2026-01-20 23:55:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('179', '15', 'Chirirbandar', 'Chirirbandar', '2026-01-20 23:55:36', '2026-01-20 23:55:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('180', '15', 'Phulbari', 'Phulbari', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('181', '15', 'Ghoraghat', 'Ghoraghat', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('182', '15', 'Hakimpur', 'Hakimpur', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('183', '15', 'Kaharole', 'Kaharole', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('184', '15', 'Khansama', 'Khansama', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('185', '15', 'Nawabganj', 'Nawabganj', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('186', '15', 'Parbatipur', 'Parbatipur', '2026-01-20 23:55:37', '2026-01-20 23:55:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('187', '16', 'Faridpur Sadar', 'Faridpur Sadar', '2026-01-20 23:55:38', '2026-01-20 23:55:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('188', '16', 'Boalmari', 'Boalmari', '2026-01-20 23:55:38', '2026-01-20 23:55:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('189', '16', 'Alfadanga', 'Alfadanga', '2026-01-20 23:55:38', '2026-01-20 23:55:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('190', '16', 'Madhukhali', 'Madhukhali', '2026-01-20 23:55:38', '2026-01-20 23:55:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('191', '16', 'Bhanga', 'Bhanga', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('192', '16', 'Nagarkanda', 'Nagarkanda', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('193', '16', 'Charbhadrasan', 'Charbhadrasan', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('194', '16', 'Sadarpur', 'Sadarpur', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('195', '16', 'Saltha', 'Saltha', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('196', '17', 'Feni Sadar', 'Feni Sadar', '2026-01-20 23:55:39', '2026-01-20 23:55:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('197', '17', 'Chhagalnaiya', 'Chhagalnaiya', '2026-01-20 23:55:40', '2026-01-20 23:55:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('198', '17', 'Daganbhuiyan', 'Daganbhuiyan', '2026-01-20 23:55:40', '2026-01-20 23:55:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('199', '17', 'Parshuram', 'Parshuram', '2026-01-20 23:55:40', '2026-01-20 23:55:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('200', '17', 'Fulgazi', 'Fulgazi', '2026-01-20 23:55:40', '2026-01-20 23:55:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('201', '17', 'Sonagazi', 'Sonagazi', '2026-01-20 23:55:40', '2026-01-20 23:55:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('202', '18', 'Gaibandha Sadar', 'Gaibandha Sadar', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('203', '18', 'Fulchhari', 'Fulchhari', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('204', '18', 'Gobindaganj', 'Gobindaganj', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('205', '18', 'Palashbari', 'Palashbari', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('206', '18', 'Sadullapur', 'Sadullapur', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('207', '18', 'Saghata', 'Saghata', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('208', '18', 'Sundarganj', 'Sundarganj', '2026-01-20 23:55:41', '2026-01-20 23:55:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('209', '19', 'Gazipur Sadar', 'Gazipur Sadar', '2026-01-20 23:55:42', '2026-01-20 23:55:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('210', '19', 'Kaliakair', 'Kaliakair', '2026-01-20 23:55:42', '2026-01-20 23:55:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('211', '19', 'Kaliganj', 'Kaliganj', '2026-01-20 23:55:42', '2026-01-20 23:55:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('212', '19', 'Kapasia', 'Kapasia', '2026-01-20 23:55:42', '2026-01-20 23:55:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('213', '19', 'Sreepur', 'Sreepur', '2026-01-20 23:55:42', '2026-01-20 23:55:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('214', '19', 'Tongi', 'Tongi', '2026-01-20 23:55:43', '2026-01-20 23:55:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('215', '20', 'Gopalganj Sadar', 'Gopalganj Sadar', '2026-01-20 23:55:43', '2026-01-20 23:55:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('216', '20', 'Kashiani', 'Kashiani', '2026-01-20 23:55:43', '2026-01-20 23:55:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('217', '20', 'Kotalipara', 'Kotalipara', '2026-01-20 23:55:43', '2026-01-20 23:55:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('218', '20', 'Muksudpur', 'Muksudpur', '2026-01-20 23:55:43', '2026-01-20 23:55:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('219', '20', 'Tungipara', 'Tungipara', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('220', '21', 'Habiganj Sadar', 'Habiganj Sadar', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('221', '21', 'Ajmiriganj', 'Ajmiriganj', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('222', '21', 'Bahubal', 'Bahubal', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('223', '21', 'Baniyachong', 'Baniyachong', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('224', '21', 'Chunarughat', 'Chunarughat', '2026-01-20 23:55:44', '2026-01-20 23:55:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('225', '21', 'Lakhai', 'Lakhai', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('226', '21', 'Madhabpur', 'Madhabpur', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('227', '21', 'Nabiganj', 'Nabiganj', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('228', '21', 'Shaistaganj', 'Shaistaganj', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('229', '22', 'Jamalpur Sadar', 'Jamalpur Sadar', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('230', '22', 'Bakshiganj', 'Bakshiganj', '2026-01-20 23:55:45', '2026-01-20 23:55:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('231', '22', 'Dewanganj', 'Dewanganj', '2026-01-20 23:55:46', '2026-01-20 23:55:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('232', '22', 'Islampur', 'Islampur', '2026-01-20 23:55:46', '2026-01-20 23:55:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('233', '22', 'Madarganj', 'Madarganj', '2026-01-20 23:55:46', '2026-01-20 23:55:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('234', '22', 'Melandaha', 'Melandaha', '2026-01-20 23:55:46', '2026-01-20 23:55:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('235', '22', 'Sarishabari', 'Sarishabari', '2026-01-20 23:55:46', '2026-01-20 23:55:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('236', '23', 'Jashore Sadar', 'Jashore Sadar', '2026-01-20 23:55:57', '2026-01-20 23:55:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('237', '23', 'Abhaynagar', 'Abhaynagar', '2026-01-20 23:55:58', '2026-01-20 23:55:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('238', '23', 'Bagherpara', 'Bagherpara', '2026-01-20 23:55:58', '2026-01-20 23:55:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('239', '23', 'Chaugachha', 'Chaugachha', '2026-01-20 23:55:58', '2026-01-20 23:55:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('240', '23', 'Jhikargachha', 'Jhikargachha', '2026-01-20 23:55:58', '2026-01-20 23:55:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('241', '23', 'Keshabpur', 'Keshabpur', '2026-01-20 23:55:58', '2026-01-20 23:55:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('242', '23', 'Manirampur', 'Manirampur', '2026-01-20 23:55:59', '2026-01-20 23:55:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('243', '23', 'Sharsha', 'Sharsha', '2026-01-20 23:55:59', '2026-01-20 23:55:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('244', '24', 'Jhalokati Sadar', 'Jhalokati Sadar', '2026-01-20 23:55:59', '2026-01-20 23:55:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('245', '24', 'Kathalia', 'Kathalia', '2026-01-20 23:55:59', '2026-01-20 23:55:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('246', '24', 'Nalchity', 'Nalchity', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('247', '24', 'Rajapur', 'Rajapur', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('248', '25', 'Jhenaidah Sadar', 'Jhenaidah Sadar', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('249', '25', 'Harinakunda', 'Harinakunda', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('250', '25', 'Kaliganj', 'Kaliganj', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('251', '25', 'Kotchandpur', 'Kotchandpur', '2026-01-20 23:56:00', '2026-01-20 23:56:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('252', '25', 'Maheshpur', 'Maheshpur', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('253', '25', 'Shailkupa', 'Shailkupa', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('254', '26', 'Joypurhat Sadar', 'Joypurhat Sadar', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('255', '26', 'Akkelpur', 'Akkelpur', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('256', '26', 'Kalai', 'Kalai', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('257', '26', 'Khetlal', 'Khetlal', '2026-01-20 23:56:01', '2026-01-20 23:56:01');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('258', '26', 'Panchbibi', 'Panchbibi', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('259', '27', 'Khagrachhari Sadar', 'Khagrachhari Sadar', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('260', '27', 'Dighinala', 'Dighinala', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('261', '27', 'Lakshmichhari', 'Lakshmichhari', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('262', '27', 'Mahalchhari', 'Mahalchhari', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('263', '27', 'Manikchhari', 'Manikchhari', '2026-01-20 23:56:02', '2026-01-20 23:56:02');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('264', '27', 'Matiranga', 'Matiranga', '2026-01-20 23:56:03', '2026-01-20 23:56:03');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('265', '27', 'Panchhari', 'Panchhari', '2026-01-20 23:56:03', '2026-01-20 23:56:03');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('266', '27', 'Ramgarh', 'Ramgarh', '2026-01-20 23:56:03', '2026-01-20 23:56:03');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('267', '28', 'Khulna Sadar', 'Khulna Sadar', '2026-01-20 23:56:03', '2026-01-20 23:56:03');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('268', '28', 'Batiaghata', 'Batiaghata', '2026-01-20 23:56:04', '2026-01-20 23:56:04');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('269', '28', 'Dacope', 'Dacope', '2026-01-20 23:56:04', '2026-01-20 23:56:04');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('270', '28', 'Dumuria', 'Dumuria', '2026-01-20 23:56:04', '2026-01-20 23:56:04');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('271', '28', 'Dighalia', 'Dighalia', '2026-01-20 23:56:04', '2026-01-20 23:56:04');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('272', '28', 'Koyra', 'Koyra', '2026-01-20 23:56:04', '2026-01-20 23:56:04');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('273', '28', 'Paikgachha', 'Paikgachha', '2026-01-20 23:56:05', '2026-01-20 23:56:05');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('274', '28', 'Phultala', 'Phultala', '2026-01-20 23:56:05', '2026-01-20 23:56:05');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('275', '28', 'Rupsha', 'Rupsha', '2026-01-20 23:56:05', '2026-01-20 23:56:05');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('276', '28', 'Terokhada', 'Terokhada', '2026-01-20 23:56:06', '2026-01-20 23:56:06');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('277', '29', 'Kishoreganj Sadar', 'Kishoreganj Sadar', '2026-01-20 23:56:06', '2026-01-20 23:56:06');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('278', '29', 'Austagram', 'Austagram', '2026-01-20 23:56:06', '2026-01-20 23:56:06');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('279', '29', 'Bajitpur', 'Bajitpur', '2026-01-20 23:56:06', '2026-01-20 23:56:06');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('280', '29', 'Bhairab', 'Bhairab', '2026-01-20 23:56:06', '2026-01-20 23:56:06');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('281', '29', 'Hossainpur', 'Hossainpur', '2026-01-20 23:56:07', '2026-01-20 23:56:07');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('282', '29', 'Itna', 'Itna', '2026-01-20 23:56:07', '2026-01-20 23:56:07');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('283', '29', 'Karimganj', 'Karimganj', '2026-01-20 23:56:07', '2026-01-20 23:56:07');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('284', '29', 'Katiadi', 'Katiadi', '2026-01-20 23:56:07', '2026-01-20 23:56:07');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('285', '29', 'Kuliarchar', 'Kuliarchar', '2026-01-20 23:56:07', '2026-01-20 23:56:07');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('286', '29', 'Mithamain', 'Mithamain', '2026-01-20 23:56:08', '2026-01-20 23:56:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('287', '29', 'Nikli', 'Nikli', '2026-01-20 23:56:08', '2026-01-20 23:56:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('288', '29', 'Pakundia', 'Pakundia', '2026-01-20 23:56:08', '2026-01-20 23:56:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('289', '29', 'Tarail', 'Tarail', '2026-01-20 23:56:08', '2026-01-20 23:56:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('290', '30', 'Kurigram Sadar', 'Kurigram Sadar', '2026-01-20 23:56:08', '2026-01-20 23:56:08');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('291', '30', 'Bhurungamari', 'Bhurungamari', '2026-01-20 23:56:09', '2026-01-20 23:56:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('292', '30', 'Char Rajibpur', 'Char Rajibpur', '2026-01-20 23:56:09', '2026-01-20 23:56:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('293', '30', 'Chilmari', 'Chilmari', '2026-01-20 23:56:09', '2026-01-20 23:56:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('294', '30', 'Phulbari', 'Phulbari', '2026-01-20 23:56:09', '2026-01-20 23:56:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('295', '30', 'Nageshwari', 'Nageshwari', '2026-01-20 23:56:09', '2026-01-20 23:56:09');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('296', '30', 'Rajarhat', 'Rajarhat', '2026-01-20 23:56:10', '2026-01-20 23:56:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('297', '30', 'Raomari', 'Raomari', '2026-01-20 23:56:10', '2026-01-20 23:56:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('298', '30', 'Ulipur', 'Ulipur', '2026-01-20 23:56:10', '2026-01-20 23:56:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('299', '31', 'Kushtia Sadar', 'Kushtia Sadar', '2026-01-20 23:56:10', '2026-01-20 23:56:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('300', '31', 'Bheramara', 'Bheramara', '2026-01-20 23:56:10', '2026-01-20 23:56:10');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('301', '31', 'Daulatpur', 'Daulatpur', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('302', '31', 'Khoksa', 'Khoksa', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('303', '31', 'Kumarkhali', 'Kumarkhali', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('304', '31', 'Mirpur', 'Mirpur', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('305', '32', 'Lakshmipur Sadar', 'Lakshmipur Sadar', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('306', '32', 'Raipur', 'Raipur', '2026-01-20 23:56:11', '2026-01-20 23:56:11');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('307', '32', 'Ramganj', 'Ramganj', '2026-01-20 23:56:12', '2026-01-20 23:56:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('308', '32', 'Ramgati', 'Ramgati', '2026-01-20 23:56:12', '2026-01-20 23:56:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('309', '32', 'Kamalnagar', 'Kamalnagar', '2026-01-20 23:56:12', '2026-01-20 23:56:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('310', '33', 'Lalmonirhat Sadar', 'Lalmonirhat Sadar', '2026-01-20 23:56:12', '2026-01-20 23:56:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('311', '33', 'Aditmari', 'Aditmari', '2026-01-20 23:56:12', '2026-01-20 23:56:12');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('312', '33', 'Hatibandha', 'Hatibandha', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('313', '33', 'Kaliganj', 'Kaliganj', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('314', '33', 'Patgram', 'Patgram', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('315', '34', 'Madaripur Sadar', 'Madaripur Sadar', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('316', '34', 'Kalkini', 'Kalkini', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('317', '34', 'Rajoir', 'Rajoir', '2026-01-20 23:56:13', '2026-01-20 23:56:13');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('318', '34', 'Shibchar', 'Shibchar', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('319', '35', 'Magura Sadar', 'Magura Sadar', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('320', '35', 'Mohammadpur', 'Mohammadpur', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('321', '35', 'Shalikha', 'Shalikha', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('322', '35', 'Sreepur', 'Sreepur', '2026-01-20 23:56:14', '2026-01-20 23:56:14');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('323', '36', 'Manikganj Sadar', 'Manikganj Sadar', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('324', '36', 'Singair', 'Singair', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('325', '36', 'Shibalaya', 'Shibalaya', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('326', '36', 'Saturia', 'Saturia', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('327', '36', 'Harirampur', 'Harirampur', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('328', '36', 'Ghior', 'Ghior', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('329', '36', 'Daulatpur', 'Daulatpur', '2026-01-20 23:56:15', '2026-01-20 23:56:15');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('330', '37', 'Meherpur Sadar', 'Meherpur Sadar', '2026-01-20 23:56:16', '2026-01-20 23:56:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('331', '37', 'Gangni', 'Gangni', '2026-01-20 23:56:16', '2026-01-20 23:56:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('332', '37', 'Mujibnagar', 'Mujibnagar', '2026-01-20 23:56:16', '2026-01-20 23:56:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('333', '38', 'Moulvibazar Sadar', 'Moulvibazar Sadar', '2026-01-20 23:56:16', '2026-01-20 23:56:16');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('334', '38', 'Barlekha', 'Barlekha', '2026-01-20 23:56:17', '2026-01-20 23:56:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('335', '38', 'Juri', 'Juri', '2026-01-20 23:56:17', '2026-01-20 23:56:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('336', '38', 'Kamalganj', 'Kamalganj', '2026-01-20 23:56:17', '2026-01-20 23:56:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('337', '38', 'Kulaura', 'Kulaura', '2026-01-20 23:56:17', '2026-01-20 23:56:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('338', '38', 'Rajnagar', 'Rajnagar', '2026-01-20 23:56:17', '2026-01-20 23:56:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('339', '38', 'Sreemangal', 'Sreemangal', '2026-01-20 23:56:17', '2026-01-20 23:56:17');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('340', '39', 'Munshiganj Sadar', 'Munshiganj Sadar', '2026-01-20 23:56:18', '2026-01-20 23:56:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('341', '39', 'Lohajang', 'Lohajang', '2026-01-20 23:56:18', '2026-01-20 23:56:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('342', '39', 'Sirajdikhan', 'Sirajdikhan', '2026-01-20 23:56:18', '2026-01-20 23:56:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('343', '39', 'Sreenagar', 'Sreenagar', '2026-01-20 23:56:18', '2026-01-20 23:56:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('344', '39', 'Tongibari', 'Tongibari', '2026-01-20 23:56:18', '2026-01-20 23:56:18');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('345', '39', 'Gazaria', 'Gazaria', '2026-01-20 23:56:19', '2026-01-20 23:56:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('346', '40', 'Mymensingh Sadar', 'Mymensingh Sadar', '2026-01-20 23:56:19', '2026-01-20 23:56:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('347', '40', 'Bhaluka', 'Bhaluka', '2026-01-20 23:56:19', '2026-01-20 23:56:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('348', '40', 'Dhobaura', 'Dhobaura', '2026-01-20 23:56:19', '2026-01-20 23:56:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('349', '40', 'Fulbaria', 'Fulbaria', '2026-01-20 23:56:19', '2026-01-20 23:56:19');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('350', '40', 'Gaffargaon', 'Gaffargaon', '2026-01-20 23:56:20', '2026-01-20 23:56:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('351', '40', 'Gauripur', 'Gauripur', '2026-01-20 23:56:20', '2026-01-20 23:56:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('352', '40', 'Haluaghat', 'Haluaghat', '2026-01-20 23:56:20', '2026-01-20 23:56:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('353', '40', 'Ishwarganj', 'Ishwarganj', '2026-01-20 23:56:20', '2026-01-20 23:56:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('354', '40', 'Muktagachha', 'Muktagachha', '2026-01-20 23:56:20', '2026-01-20 23:56:20');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('355', '40', 'Nandail', 'Nandail', '2026-01-20 23:56:21', '2026-01-20 23:56:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('356', '40', 'Phulpur', 'Phulpur', '2026-01-20 23:56:21', '2026-01-20 23:56:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('357', '40', 'Trishal', 'Trishal', '2026-01-20 23:56:21', '2026-01-20 23:56:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('358', '41', 'Naogaon Sadar', 'Naogaon Sadar', '2026-01-20 23:56:21', '2026-01-20 23:56:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('359', '41', 'Atrai', 'Atrai', '2026-01-20 23:56:21', '2026-01-20 23:56:21');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('360', '41', 'Badalgachhi', 'Badalgachhi', '2026-01-20 23:56:22', '2026-01-20 23:56:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('361', '41', 'Dhamoirhat', 'Dhamoirhat', '2026-01-20 23:56:22', '2026-01-20 23:56:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('362', '41', 'Manda', 'Manda', '2026-01-20 23:56:22', '2026-01-20 23:56:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('363', '41', 'Mohadevpur', 'Mohadevpur', '2026-01-20 23:56:22', '2026-01-20 23:56:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('364', '41', 'Niamatpur', 'Niamatpur', '2026-01-20 23:56:22', '2026-01-20 23:56:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('365', '41', 'Patnitala', 'Patnitala', '2026-01-20 23:56:22', '2026-01-20 23:56:22');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('366', '41', 'Porsha', 'Porsha', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('367', '41', 'Raninagar', 'Raninagar', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('368', '41', 'Sapahar', 'Sapahar', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('369', '42', 'Narail Sadar', 'Narail Sadar', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('370', '42', 'Kalia', 'Kalia', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('371', '42', 'Lohagara', 'Lohagara', '2026-01-20 23:56:23', '2026-01-20 23:56:23');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('372', '43', 'Narayanganj Sadar', 'Narayanganj Sadar', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('373', '43', 'Araihazar', 'Araihazar', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('374', '43', 'Bandar', 'Bandar', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('375', '43', 'Rupganj', 'Rupganj', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('376', '43', 'Sonargaon', 'Sonargaon', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('377', '43', 'Siddhirganj', 'Siddhirganj', '2026-01-20 23:56:24', '2026-01-20 23:56:24');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('378', '44', 'Narsingdi Sadar', 'Narsingdi Sadar', '2026-01-20 23:56:25', '2026-01-20 23:56:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('379', '44', 'Belabo', 'Belabo', '2026-01-20 23:56:25', '2026-01-20 23:56:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('380', '44', 'Monohardi', 'Monohardi', '2026-01-20 23:56:25', '2026-01-20 23:56:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('381', '44', 'Palash', 'Palash', '2026-01-20 23:56:25', '2026-01-20 23:56:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('382', '44', 'Raipura', 'Raipura', '2026-01-20 23:56:25', '2026-01-20 23:56:25');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('383', '44', 'Shibpur', 'Shibpur', '2026-01-20 23:56:26', '2026-01-20 23:56:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('384', '45', 'Natore Sadar', 'Natore Sadar', '2026-01-20 23:56:26', '2026-01-20 23:56:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('385', '45', 'Bagatipara', 'Bagatipara', '2026-01-20 23:56:26', '2026-01-20 23:56:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('386', '45', 'Baraigram', 'Baraigram', '2026-01-20 23:56:26', '2026-01-20 23:56:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('387', '45', 'Gurudaspur', 'Gurudaspur', '2026-01-20 23:56:26', '2026-01-20 23:56:26');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('388', '45', 'Lalpur', 'Lalpur', '2026-01-20 23:56:27', '2026-01-20 23:56:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('389', '45', 'Singra', 'Singra', '2026-01-20 23:56:27', '2026-01-20 23:56:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('390', '45', 'Naldanga', 'Naldanga', '2026-01-20 23:56:27', '2026-01-20 23:56:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('391', '46', 'Netrokona Sadar', 'Netrokona Sadar', '2026-01-20 23:56:27', '2026-01-20 23:56:27');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('392', '46', 'Atpara', 'Atpara', '2026-01-20 23:56:28', '2026-01-20 23:56:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('393', '46', 'Barhatta', 'Barhatta', '2026-01-20 23:56:28', '2026-01-20 23:56:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('394', '46', 'Durgapur', 'Durgapur', '2026-01-20 23:56:28', '2026-01-20 23:56:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('395', '46', 'Khaliajuri', 'Khaliajuri', '2026-01-20 23:56:28', '2026-01-20 23:56:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('396', '46', 'Kalmakanda', 'Kalmakanda', '2026-01-20 23:56:28', '2026-01-20 23:56:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('397', '46', 'Kendua', 'Kendua', '2026-01-20 23:56:28', '2026-01-20 23:56:28');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('398', '46', 'Madan', 'Madan', '2026-01-20 23:56:29', '2026-01-20 23:56:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('399', '46', 'Mohanganj', 'Mohanganj', '2026-01-20 23:56:29', '2026-01-20 23:56:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('400', '46', 'Purbadhala', 'Purbadhala', '2026-01-20 23:56:29', '2026-01-20 23:56:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('401', '47', 'Nilphamari Sadar', 'Nilphamari Sadar', '2026-01-20 23:56:29', '2026-01-20 23:56:29');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('402', '47', 'Dimla', 'Dimla', '2026-01-20 23:56:30', '2026-01-20 23:56:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('403', '47', 'Domar', 'Domar', '2026-01-20 23:56:30', '2026-01-20 23:56:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('404', '47', 'Jaldhaka', 'Jaldhaka', '2026-01-20 23:56:30', '2026-01-20 23:56:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('405', '47', 'Kishoreganj', 'Kishoreganj', '2026-01-20 23:56:30', '2026-01-20 23:56:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('406', '47', 'Saidpur', 'Saidpur', '2026-01-20 23:56:30', '2026-01-20 23:56:30');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('407', '48', 'Noakhali Sadar', 'Noakhali Sadar', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('408', '48', 'Begumganj', 'Begumganj', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('409', '48', 'Chatkhil', 'Chatkhil', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('410', '48', 'Companiganj', 'Companiganj', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('411', '48', 'Hatiya', 'Hatiya', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('412', '48', 'Senbagh', 'Senbagh', '2026-01-20 23:56:31', '2026-01-20 23:56:31');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('413', '48', 'Sonaimuri', 'Sonaimuri', '2026-01-20 23:56:32', '2026-01-20 23:56:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('414', '48', 'Subarnachar', 'Subarnachar', '2026-01-20 23:56:32', '2026-01-20 23:56:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('415', '48', 'Kabirhat', 'Kabirhat', '2026-01-20 23:56:32', '2026-01-20 23:56:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('416', '49', 'Pabna Sadar', 'Pabna Sadar', '2026-01-20 23:56:32', '2026-01-20 23:56:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('417', '49', 'Atgharia', 'Atgharia', '2026-01-20 23:56:32', '2026-01-20 23:56:32');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('418', '49', 'Bera', 'Bera', '2026-01-20 23:56:33', '2026-01-20 23:56:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('419', '49', 'Bhangura', 'Bhangura', '2026-01-20 23:56:33', '2026-01-20 23:56:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('420', '49', 'Chatmohar', 'Chatmohar', '2026-01-20 23:56:33', '2026-01-20 23:56:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('421', '49', 'Faridpur', 'Faridpur', '2026-01-20 23:56:33', '2026-01-20 23:56:33');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('422', '49', 'Ishwardi', 'Ishwardi', '2026-01-20 23:56:34', '2026-01-20 23:56:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('423', '49', 'Santhia', 'Santhia', '2026-01-20 23:56:34', '2026-01-20 23:56:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('424', '49', 'Sujanagar', 'Sujanagar', '2026-01-20 23:56:34', '2026-01-20 23:56:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('425', '50', 'Panchagarh Sadar', 'Panchagarh Sadar', '2026-01-20 23:56:34', '2026-01-20 23:56:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('426', '50', 'Atwari', 'Atwari', '2026-01-20 23:56:34', '2026-01-20 23:56:34');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('427', '50', 'Boda', 'Boda', '2026-01-20 23:56:35', '2026-01-20 23:56:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('428', '50', 'Debiganj', 'Debiganj', '2026-01-20 23:56:35', '2026-01-20 23:56:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('429', '50', 'Tetulia', 'Tetulia', '2026-01-20 23:56:35', '2026-01-20 23:56:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('430', '51', 'Patuakhali Sadar', 'Patuakhali Sadar', '2026-01-20 23:56:35', '2026-01-20 23:56:35');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('431', '51', 'Bauphal', 'Bauphal', '2026-01-20 23:56:36', '2026-01-20 23:56:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('432', '51', 'Dashmina', 'Dashmina', '2026-01-20 23:56:36', '2026-01-20 23:56:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('433', '51', 'Galachipa', 'Galachipa', '2026-01-20 23:56:36', '2026-01-20 23:56:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('434', '51', 'Kalapara', 'Kalapara', '2026-01-20 23:56:36', '2026-01-20 23:56:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('435', '51', 'Mirzaganj', 'Mirzaganj', '2026-01-20 23:56:36', '2026-01-20 23:56:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('436', '51', 'Rangabali', 'Rangabali', '2026-01-20 23:56:36', '2026-01-20 23:56:36');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('437', '52', 'Pirojpur Sadar', 'Pirojpur Sadar', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('438', '52', 'Bhandaria', 'Bhandaria', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('439', '52', 'Kawkhali', 'Kawkhali', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('440', '52', 'Mathbaria', 'Mathbaria', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('441', '52', 'Nazirpur', 'Nazirpur', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('442', '52', 'Nesarabad', 'Nesarabad', '2026-01-20 23:56:37', '2026-01-20 23:56:37');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('443', '52', 'Indurkani', 'Indurkani', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('444', '53', 'Rajbari Sadar', 'Rajbari Sadar', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('445', '53', 'Baliakandi', 'Baliakandi', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('446', '53', 'Goalandaghat', 'Goalandaghat', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('447', '53', 'Pangsha', 'Pangsha', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('448', '53', 'Kalukhali', 'Kalukhali', '2026-01-20 23:56:38', '2026-01-20 23:56:38');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('449', '54', 'Rajshahi Sadar', 'Rajshahi Sadar', '2026-01-20 23:56:39', '2026-01-20 23:56:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('450', '54', 'Bagha', 'Bagha', '2026-01-20 23:56:39', '2026-01-20 23:56:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('451', '54', 'Bagmara', 'Bagmara', '2026-01-20 23:56:39', '2026-01-20 23:56:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('452', '54', 'Charghat', 'Charghat', '2026-01-20 23:56:39', '2026-01-20 23:56:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('453', '54', 'Durgapur', 'Durgapur', '2026-01-20 23:56:39', '2026-01-20 23:56:39');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('454', '54', 'Godagari', 'Godagari', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('455', '54', 'Mohanpur', 'Mohanpur', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('456', '54', 'Paba', 'Paba', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('457', '54', 'Puthia', 'Puthia', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('458', '54', 'Tanore', 'Tanore', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('459', '55', 'Rangamati Sadar', 'Rangamati Sadar', '2026-01-20 23:56:40', '2026-01-20 23:56:40');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('460', '55', 'Bagaichhari', 'Bagaichhari', '2026-01-20 23:56:41', '2026-01-20 23:56:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('461', '55', 'Barkal', 'Barkal', '2026-01-20 23:56:41', '2026-01-20 23:56:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('462', '55', 'Kawkhali', 'Kawkhali', '2026-01-20 23:56:41', '2026-01-20 23:56:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('463', '55', 'Belaichhari', 'Belaichhari', '2026-01-20 23:56:41', '2026-01-20 23:56:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('464', '55', 'Kaptai', 'Kaptai', '2026-01-20 23:56:41', '2026-01-20 23:56:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('465', '55', 'Juraichhari', 'Juraichhari', '2026-01-20 23:56:41', '2026-01-20 23:56:41');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('466', '55', 'Langadu', 'Langadu', '2026-01-20 23:56:42', '2026-01-20 23:56:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('467', '55', 'Naniarchar', 'Naniarchar', '2026-01-20 23:56:42', '2026-01-20 23:56:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('468', '55', 'Rajasthali', 'Rajasthali', '2026-01-20 23:56:42', '2026-01-20 23:56:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('469', '56', 'Rangpur Sadar', 'Rangpur Sadar', '2026-01-20 23:56:42', '2026-01-20 23:56:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('470', '56', 'Badarganj', 'Badarganj', '2026-01-20 23:56:42', '2026-01-20 23:56:42');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('471', '56', 'Gangachara', 'Gangachara', '2026-01-20 23:56:43', '2026-01-20 23:56:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('472', '56', 'Kaunia', 'Kaunia', '2026-01-20 23:56:43', '2026-01-20 23:56:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('473', '56', 'Mithapukur', 'Mithapukur', '2026-01-20 23:56:43', '2026-01-20 23:56:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('474', '56', 'Pirgachha', 'Pirgachha', '2026-01-20 23:56:43', '2026-01-20 23:56:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('475', '56', 'Pirganj', 'Pirganj', '2026-01-20 23:56:43', '2026-01-20 23:56:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('476', '56', 'Taraganj', 'Taraganj', '2026-01-20 23:56:43', '2026-01-20 23:56:43');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('477', '57', 'Satkhira Sadar', 'Satkhira Sadar', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('478', '57', 'Assasuni', 'Assasuni', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('479', '57', 'Debhata', 'Debhata', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('480', '57', 'Kalaroa', 'Kalaroa', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('481', '57', 'Kaliganj', 'Kaliganj', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('482', '57', 'Shyamnagar', 'Shyamnagar', '2026-01-20 23:56:44', '2026-01-20 23:56:44');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('483', '57', 'Tala', 'Tala', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('484', '58', 'Shariatpur Sadar', 'Shariatpur Sadar', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('485', '58', 'Bhedarganj', 'Bhedarganj', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('486', '58', 'Damudya', 'Damudya', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('487', '58', 'Gosairhat', 'Gosairhat', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('488', '58', 'Naria', 'Naria', '2026-01-20 23:56:45', '2026-01-20 23:56:45');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('489', '58', 'Zajira', 'Zajira', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('490', '59', 'Sherpur Sadar', 'Sherpur Sadar', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('491', '59', 'Jhenaigati', 'Jhenaigati', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('492', '59', 'Nakla', 'Nakla', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('493', '59', 'Nalitabari', 'Nalitabari', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('494', '59', 'Sreebardi', 'Sreebardi', '2026-01-20 23:56:46', '2026-01-20 23:56:46');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('495', '60', 'Sirajganj Sadar', 'Sirajganj Sadar', '2026-01-20 23:56:47', '2026-01-20 23:56:47');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('496', '60', 'Belkuchi', 'Belkuchi', '2026-01-20 23:56:47', '2026-01-20 23:56:47');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('497', '60', 'Chauhali', 'Chauhali', '2026-01-20 23:56:47', '2026-01-20 23:56:47');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('498', '60', 'Kamarkhanda', 'Kamarkhanda', '2026-01-20 23:56:47', '2026-01-20 23:56:47');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('499', '60', 'Kazipur', 'Kazipur', '2026-01-20 23:56:47', '2026-01-20 23:56:47');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('500', '60', 'Raiganj', 'Raiganj', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('501', '60', 'Shahjadpur', 'Shahjadpur', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('502', '60', 'Tarash', 'Tarash', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('503', '60', 'Ullahpara', 'Ullahpara', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('504', '61', 'Sunamganj Sadar', 'Sunamganj Sadar', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('505', '61', 'Bishwamvarpur', 'Bishwamvarpur', '2026-01-20 23:56:48', '2026-01-20 23:56:48');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('506', '61', 'Chhatak', 'Chhatak', '2026-01-20 23:56:49', '2026-01-20 23:56:49');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('507', '61', 'Dakshin Sunamganj', 'Dakshin Sunamganj', '2026-01-20 23:56:49', '2026-01-20 23:56:49');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('508', '61', 'Derai', 'Derai', '2026-01-20 23:56:49', '2026-01-20 23:56:49');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('509', '61', 'Dharamapasha', 'Dharamapasha', '2026-01-20 23:56:49', '2026-01-20 23:56:49');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('510', '61', 'Dowarabazar', 'Dowarabazar', '2026-01-20 23:56:49', '2026-01-20 23:56:49');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('511', '61', 'Jagannathpur', 'Jagannathpur', '2026-01-20 23:56:54', '2026-01-20 23:56:54');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('512', '61', 'Jamalganj', 'Jamalganj', '2026-01-20 23:56:54', '2026-01-20 23:56:54');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('513', '61', 'Sullah', 'Sullah', '2026-01-20 23:56:54', '2026-01-20 23:56:54');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('514', '61', 'Tahirpur', 'Tahirpur', '2026-01-20 23:56:55', '2026-01-20 23:56:55');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('515', '62', 'Sylhet Sadar', 'Sylhet Sadar', '2026-01-20 23:56:55', '2026-01-20 23:56:55');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('516', '62', 'Balaganj', 'Balaganj', '2026-01-20 23:56:55', '2026-01-20 23:56:55');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('517', '62', 'Beanibazar', 'Beanibazar', '2026-01-20 23:56:55', '2026-01-20 23:56:55');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('518', '62', 'Bishwanath', 'Bishwanath', '2026-01-20 23:56:55', '2026-01-20 23:56:55');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('519', '62', 'Companiganj', 'Companiganj', '2026-01-20 23:56:56', '2026-01-20 23:56:56');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('520', '62', 'Fenchuganj', 'Fenchuganj', '2026-01-20 23:56:56', '2026-01-20 23:56:56');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('521', '62', 'Golapganj', 'Golapganj', '2026-01-20 23:56:56', '2026-01-20 23:56:56');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('522', '62', 'Gowainghat', 'Gowainghat', '2026-01-20 23:56:56', '2026-01-20 23:56:56');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('523', '62', 'Jaintiapur', 'Jaintiapur', '2026-01-20 23:56:56', '2026-01-20 23:56:56');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('524', '62', 'Kanaighat', 'Kanaighat', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('525', '62', 'Osmani Nagar', 'Osmani Nagar', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('526', '62', 'South Surma', 'South Surma', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('527', '62', 'Zakiganj', 'Zakiganj', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('528', '63', 'Tangail Sadar', 'Tangail Sadar', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('529', '63', 'Basail', 'Basail', '2026-01-20 23:56:57', '2026-01-20 23:56:57');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('530', '63', 'Bhuapur', 'Bhuapur', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('531', '63', 'Delduar', 'Delduar', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('532', '63', 'Dhanbari', 'Dhanbari', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('533', '63', 'Ghatail', 'Ghatail', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('534', '63', 'Gopalpur', 'Gopalpur', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('535', '63', 'Kalihati', 'Kalihati', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('536', '63', 'Madhupur', 'Madhupur', '2026-01-20 23:56:58', '2026-01-20 23:56:58');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('537', '63', 'Mirzapur', 'Mirzapur', '2026-01-20 23:56:59', '2026-01-20 23:56:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('538', '63', 'Nagarpur', 'Nagarpur', '2026-01-20 23:56:59', '2026-01-20 23:56:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('539', '63', 'Sakhipur', 'Sakhipur', '2026-01-20 23:56:59', '2026-01-20 23:56:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('540', '64', 'Thakurgaon Sadar', 'Thakurgaon Sadar', '2026-01-20 23:56:59', '2026-01-20 23:56:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('541', '64', 'Baliadangi', 'Baliadangi', '2026-01-20 23:56:59', '2026-01-20 23:56:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('542', '64', 'Haripur', 'Haripur', '2026-01-20 23:56:59', '2026-01-20 23:56:59');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('543', '64', 'Pirganj', 'Pirganj', '2026-01-20 23:57:00', '2026-01-20 23:57:00');
INSERT INTO `areas` (`id`, `district_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES ('544', '64', 'Ranishankail', 'Ranishankail', '2026-01-20 23:57:00', '2026-01-20 23:57:00');

SET FOREIGN_KEY_CHECKS=1;

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement("INSERT INTO `jb_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
//(1, 'Super Administrator Role', '2020-02-13 15:14:08', '2020-02-23 15:35:30'),
//(2, 'Staff Role', '2020-02-13 16:06:53', '2020-02-23 15:36:42'),
//(3, 'test role', '2020-02-18 11:41:47', '2020-02-18 11:41:47');");


//        DB::statement("INSERT INTO `jb_role_permissions` (`id`, `jb_role_id`, `jb_permission_id`, `created_at`, `updated_at`) VALUES
//(59, 2, 1, '2020-02-24 13:20:41', '2020-02-24 13:20:41'),
//(60, 2, 7, '2020-02-24 13:20:41', '2020-02-24 13:20:41'),
//(72, 1, 1, '2020-03-03 12:14:14', '2020-03-03 12:14:14'),
//(73, 1, 2, '2020-03-03 12:14:14', '2020-03-03 12:14:14'),
//(74, 1, 3, '2020-03-03 12:14:14', '2020-03-03 12:14:14'),
//(75, 1, 7, '2020-03-03 12:14:14', '2020-03-03 12:14:14'),
//(76, 1, 8, '2020-03-03 12:14:14', '2020-03-03 12:14:14'),
//(77, 1, 9, '2020-03-03 12:14:14', '2020-03-03 12:14:14');");




//        DB::statement("INSERT INTO `jb_permissions` (`id`, `jb_role_id`, `name`, `constant`, `created_at`, `updated_at`, `sort_index`) VALUES(1, NULL, 'Recieve Applicant Notification.', 'r_a_n', '2020-02-13 20:56:01', '2020-02-19 10:13:40', NULL);
//INSERT INTO `jb_permissions` (`id`, `jb_role_id`, `name`, `constant`, `created_at`, `updated_at`, `sort_index`) VALUES(2, NULL, 'Modify Permissions', 'm_p', '2020-02-13 21:09:32', '2020-02-19 10:13:59', NULL);
//INSERT INTO `jb_permissions` (`id`, `jb_role_id`, `name`, `constant`, `created_at`, `updated_at`, `sort_index`) VALUES(3, NULL, 'Modify Roles', 'm_r', '2020-02-13 21:09:42', '2020-02-19 10:14:06', NULL);
//INSERT INTO `jb_permissions` (`id`, `jb_role_id`, `name`, `constant`, `created_at`, `updated_at`, `sort_index`) VALUES(7, NULL, 'General Administration', 'g_a', '2020-02-20 10:16:32', '2020-02-20 10:16:32', NULL);
//INSERT INTO `jb_permissions` (`id`, `jb_role_id`, `name`, `constant`, `created_at`, `updated_at`, `sort_index`) VALUES(8, NULL, 'Manage Users', 'm_u', '2020-02-20 10:18:52', '2020-02-20 10:18:52', NULL);
//INSERT INTO `jb_permissions` (`id`, `jb_role_id`, `name`, `constant`, `created_at`, `updated_at`, `sort_index`) VALUES(9, NULL, 'Change Settings', 'c_s', '2020-02-25 13:06:34', '2020-02-25 13:06:34', NULL);
//");

//        DB::statement("INSERT INTO `jb_recruitment_types` (`id`, `name`, `created_by`) VALUES(1, 'Entry Level', 178);
//INSERT INTO `jb_recruitment_types` (`id`, `name`, `created_by`) VALUES(2, 'Intermediate Level.', 178);
//INSERT INTO `jb_recruitment_types` (`id`, `name`, `created_by`) VALUES(5, 'Professional Level', 178);
//");

//        DB::statement("INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(1, 'Software Engineer.', '2019-11-18 11:21:33', '2019-11-18 11:25:08');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(2, 'Project Manager', '2019-11-18 11:24:54', '2019-11-18 11:24:54');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(3, 'Sale and Marketing', '2019-12-05 09:36:36', '2019-12-05 09:36:36');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(4, 'Finance and Operations', '2019-12-05 09:37:17', '2019-12-05 09:37:17');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(5, 'Data Consultants', '2019-12-05 09:38:59', '2019-12-05 09:38:59');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(6, 'Cloud and On premise Consultants', '2019-12-05 09:39:31', '2019-12-05 09:39:31');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(7, 'ERP Consultants', '2019-12-05 09:39:51', '2019-12-05 09:39:51');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(8, 'Secuirty Consultants', '2019-12-05 09:40:06', '2019-12-05 09:40:06');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(9, 'UI/UX Engineers', '2019-12-05 09:40:47', '2019-12-05 09:40:47');
//INSERT INTO `jb_disciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES(10, 'Drivers', '2019-12-05 09:40:57', '2019-12-05 09:40:57');
//");

//        $password = '$2y$10$mxkoUCFI32VeheqEopMN8.qG/ARsCRZSOlnQ0sFXxaxjuE08JxZ5u';

//        DB::statement("INSERT INTO `users` (`id`, `emp_num`, `name`, `sex`, `dob`, `age`, `email`, `phone_num`, `marital_status`, `password`, `workdept_id`, `job_id`, `hiredate`, `role`, `EDLEVEL`, `image`, `remember_token`, `last_promoted`, `address`, `next_of_kin`, `kin_address`, `kin_phonenum`, `kin_relationship`, `twitter`, `facebook`, `dribble`, `instagram`, `linemanager_id`, `job_app_id`, `state_origin_id`, `lga`, `status`, `locked`, `job_reg_status`, `superadmin`, `bank_name`, `bank_id`, `account_num`, `grade`, `locale`, `bank_code`, `prev_grade`, `last_grade_change_date`, `confirmed`, `seperation_date`, `about_me`, `jb_role_id`, `created_at`, `updated_at`) VALUES
//(180, NULL, 'Admin', 'M', '2019-03-15', NULL, 'admin@snapnet.com.ng', NULL, NULL, '$2y$10$mxkoUCFI32VeheqEopMN8.qG/ARsCRZSOlnQ0sFXxaxjuE08JxZ5u', NULL, NULL, NULL, 'admin', NULL, 'upload/avatar.jpg', 'hhEXJtRysF3nOqWjjJ6lEcSYPLxyeQs4aTRgcTchJgxcxlQJWCksGbwFyXlb', NULL, '10 Sodipo Street Badore Ajah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', '0', '0', '0', NULL, '1', NULL, NULL, 'en', NULL, NULL, NULL, '0', NULL, NULL, '1', '2019-03-11 13:36:47', '2020-02-24 13:22:08');
//");

    }


}

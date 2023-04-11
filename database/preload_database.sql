USE dbscholarlink;

INSERT INTO `dbscholarlink`.`courses`
(`course_id`, `course_name`, `created_at`, `updated_at`)
VALUES
(1, 'SALES AND MARKETING LAW', NOW(), NOW()),
(2, 'REAL ESTATE LAW', NOW(), NOW()),
(3, 'INTRODUCTION TO PROGRAMMING', NOW(), NOW()),
(4, 'VIRTUALIZATION AND COMPUTER NETWORKING', NOW(), NOW()),
(5, 'DATABASE', NOW(), NOW()),
(6, 'MACHINE LEARNING IN DATA SCIENCE', NOW(), NOW()),
(7, 'DIGITAL FORENSICS', NOW(), NOW()),
(8, 'CLOUD INFRASTRUCTURE', NOW(), NOW()),
(9, 'PERSONAL FINANCE', NOW(), NOW()),
(10, 'FINANCIAL STATEMENT ANALYSIS', NOW(), NOW()),
(11, 'PYTHON AND STATISTICS FOR FINANCIAL ANALYSIS', NOW(), NOW()),
(12, 'JAVASCRIPT ALGORITHMS AND DATA STRUCTURES', NOW(), NOW()),
(13, 'INTRODUCTION TO PHILOSOPHY', NOW(), NOW()),
(14, 'GRAPHIC DESIGN', NOW(), NOW()),
(15, 'INTRODUCTION TO ARTIFICIAL INTELLIGENCE (AI)', NOW(), NOW()),
(16, 'ROBOTICS', NOW(), NOW()),
(17, 'PROJECT MANAGEMENT', NOW(), NOW()),
(18, 'SUPPLY CHAIN', NOW(), NOW()),
(19, 'INTRODUCTION TO SOCIAL MEDIA MARKETING', NOW(), NOW()),
(20, 'APPLIED KNOWLEDGE MANAGEMENT', NOW(), NOW());

INSERT INTO sessions (session_id, session_course_id, session_tutor_id, session_user_id, content, created_at, updated_at)
VALUES 
(5, 3, 6,  '<p>This is the first test of the notes</p>', '2023-03-12 22:38:30', '2023-03-12 22:38:30'),
(19, 3, 6, '<p><span style="color: rgb(0, 0, 0);"><strong>Test</strong></span></p>', '2023-03-12 22:46:10', '2023-03-12 22:46:10'),
(13, 3, 6, '<p><strong>Artificial Intelligence (AI) is the simulation of human intelligence processes by machines, especially computer systems.</strong></p>\n <p>&nbsp;</p>\n <p>&nbsp;</p>\n <p><em><span style="color: rgb(126, 140, 141);"></span></em></p>', '2023-03-12 23:09:23', '2023-03-12 23:09:23'),
(6, 1, 6, 'AI has become increasingly important in modern technology, with applications in fields such as finance, healthcare, and transportation.\n &nbsp;\n &nbsp;\n &nbsp;\n AI can be categorized into two main types: narrow or weak AI and general or strong AI.\n &nbsp;\n &nbsp;\n', '2023-03-12 23:12:19', '2023-03-12 23:12:19'),
(15, 6, 6, 'A database is an organized collection of data that can be accessed and manipulated by computer software.', '2023-03-12 23:16:43', '2023-03-12 23:16:43'),
(15, 4, 6, 'A primary key is used to uniquely identify each row in a table, and foreign keys are used to establish relationships between tables.', '2023-03-12 23:21:45', '2023-03-12 23:21:45'),
(15, 6, 6, 'This are my notes from Scholar Link platform', '2023-03-12 23:22:43', '2023-03-12 23:22:43'),
(15, 2, 6, 'SQL (Structured Query Language) is the standard language used to interact with relational databases.', '2023-03-12 23:24:55', '2023-03-12 23:24:55'),
(19, 7, 6, 'Relational databases are the most common type of database used in modern applications.', '2023-03-12 23:38:07', '2023-03-12 23:24:55');

INSERT INTO tutor_courses (id, tc_course_id, tc_tutor_id, p_course_school, p_course_teacher, created_at, updated_at)
VALUES 
	(13, 15, 1, NULL, NULL, NOW(), NOW()),
	(15, 13, 1, NULL, NULL, NOW(), NOW()),
	(16, 15, 1, NULL, NULL, NOW(), NOW()),
	(17, 19, 1, 'Douglas', 'Michael Ma', NOW(), NOW()),
	(19, 5, 1, 'Douglas', 'Michael Ma', NOW(), NOW()),
	(20, 5, 2, 'Douglas', 'Michael Ma', NOW(), NOW()),
	(22, 6, 3, 'Poli', 'Ma', NOW(), NOW()),
	(23, 19, 4, 'FES', 'Rahim', NOW(), NOW()),
	(24, 1, 6, 'BCIT', 'Samuel Otim', NOW(), NOW());

INSERT INTO tutors (tutor_id, tutor_user_id, school, degree, major, description, tutor_img, created_at, updated_at)
VALUES 
(1, 1, 'Douglas College', 'Associate degree', 'Computing Studies and Information Systems', 'I am a professional with more than 5 years of experience.', 'tutor_img/flWMIXZdna1huwbUIQfMtYI62lAnmN5YE7XYurO1.jpg', '2023-02-26 06:38:39', '2023-02-26 06:38:39'),
(2, 2, 'Douglas College', 'Associate degree', 'Gastronomy', 'I am an experienced chef who won MasterChef Celebrity.', 'tutor_img/4ZB71bKnaMOr1U8VcbeysDXJMh9Tcye3UOKv3ifc.jpg', '2023-02-26 22:28:54', '2023-04-09 06:20:01'),
(3, 4, 'Simon Fraser University', 'Associate degree', 'Industrial Engineering', 'I am a professional with wide experience in Python and C#.', 'tutor_img/HOUdivzrbkjdwmjZ5agKEyL1r3KeasXemGwUh10L.jpg', '2023-02-27 03:39:38', '2023-02-27 03:39:38'),
(4, 5, 'School of Driver Douglas', 'Associate degree', 'Science', 'I am a professional Formula 1 driver, but I am also passionate about C# and Python.', 'tutor_img/TmBmXsfcbi800mw71vHNeIjEvUnTifKhy5lKUHdL.jpg', '2023-02-27 05:50:08', '2023-02-27 05:50:08'),
(5, 3, 'UNAM', 'Associate degree', 'Computing Studies and Information Systems', 'I am testing if this works, Douglas, and Python.', 'tutor_img/8Tbf4QsxTBqHKwYgeQHNlEcIDb3Meo7nhQhEGbbh.jpg', '2023-02-27 06:57:10', '2023-02-27 06:57:10'),
(6, 6, 'Fes Acatlan', 'Associate degree', 'Psicologia', 'Soy super experta en constelaciones y también sé de marketing.', 'tutor_img/UeMZfxrcZNKUOOBjRgBhqnjKex4mLbVE2kTn77Ds.jpg', '2023-02-27 07:38:31', '2023-02-27 07:38:31'),
(7, 7, 'Claustro de Sor Juana', 'Doctoral degree', 'Gastronomy', 'I have taken classes with Rahim and I am a student.', 'tutor_img/nPAI7hEgMrkZQr6VCCIbTsrsrD88RcIVk3mXhAPC.jpg', '2023-02-27 09:51:27', '2023-03-13 05:34:28'),
(9, 9, 'University of Health', 'Master degree', 'Nursing', 'I am a professional and experienced nurse, with more than 5 years of experience.', 'tutor_img/hsIAO076N2U5Qe7Qe3DCQWio6ce2qUiJ4CczOskC.jpg', '2023-04-09 04:33:27', '2023-04-09 04:33:27');

INSERT INTO user_grade (ug_user_id, ug_tutor_id, ug_course_id, grade, difficulty, take_again, created_at, updated_at)
VALUES
(2, 7, 19, 5, 4, 1, '2023-03-27 07:48:58', '2023-03-27 07:48:58'),
(2, 7, 19, 5, 1, 0, '2023-03-27 07:59:26', '2023-03-27 07:59:26'),
(2, 1, 5, 4, 1, 0, '2023-03-27 08:04:25', '2023-03-27 08:04:25'),
(2, 2, 5, 1, 1, 1, '2023-03-27 08:08:18', '2023-03-27 08:08:18'),
(2, 1, 5, 1, 5, 0, '2023-03-27 08:14:02', '2023-03-27 08:14:02'),
(2, 1, 5, 1, 1, 1, '2023-03-27 08:23:17', '2023-03-27 08:23:17'),
(2, 4, 13, 1, 1, 0, '2023-03-27 08:26:49', '2023-03-27 08:26:49'),
(2, 6, 15, 3, 2, 0, '2023-03-27 08:30:49', '2023-03-27 08:30:49'),
(2, 3, 13, 1, 5, 0, '2023-03-27 08:33:53', '2023-03-27 08:33:53'),
(2, 5, 13, 4, 1, 0, '2023-03-27 08:36:56', '2023-03-27 08:36:56'),
(2, 7, 6, 2, 4, 0, '2023-03-27 08:43:50', '2023-03-27 08:43:50'),
(2, 1, 5, 1, 1, 0, '2023-03-27 08:48:12', '2023-03-27 08:48:12'),
(2, 1, 5, 5, 5, 0, '2023-03-27 08:57:01', '2023-03-27 08:57:01'),
(2, 5, 13, 3, 3, 1, '2023-03-27 08:59:12', '2023-03-27 08:59:12'),
(2, 1, 5, 3, 1, 0, '2023-03-27 09:05:59', '2023-03-27 09:05:59');

INSERT INTO users (id, name, last_name, date_of_birth, occupation, email, email_verified_at, password, user_type, remember_token, created_at, updated_at)
VALUES 
(1, 'Pamela', 'Lemus', '1995-01-16', 'Student', 'test@gmail.com', NULL, '$2y$10$Gol.KuoQyWv9RkWPTctgVOcCbVkbCtqsRjcPtGLnJutEjCYlSHYem', 'admin', 'HOgtTP8sIJmDFCD2bQBueDvlOSnUqoqQgg6MrFU07AY8O4RYtIRSE97ZrtWK', '2023-02-26 06:37:55', '2023-02-26 06:37:55'),
(2, 'Ricardo', 'Peralta', '1987-06-03', 'Sous Chef', 'test1@gmail.com', NULL, '$2y$10$gZdFgNBX1CXJSlWPTZTFl.csoQZo6Q0VUhajxTGCEovyCjvdSryse', 'user', NULL, '2023-02-26 22:27:37', '2023-04-09 06:21:22'),
(3, 'Alastor', 'Moody', '1978-09-16', 'Professor', 'test2@gmail.com', NULL, '$2y$10$0y/HxKcfG/sZ8O5mlit1hecKx.czCbes7041wC8mXpXZElVVse.WW', 'user', NULL, '2023-02-27 01:00:46', '2023-02-27 01:00:46'),
(4, 'Halsey', 'Potter', '1978-06-08', 'Architecture', 'test3@gmail.com', NULL, '$2y$10$Ld.6SMdb4HTOhNE4d7sIg.C6HxlQhagJMRzUyS2kuSb9LVH4ZtqUm', 'user', NULL, '2023-02-27 03:38:51', '2023-02-27 03:38:51'),
(5, 'Checo', 'Perez', '1974-12-08', 'FI Driver', 'test4@gmail.com', NULL, '$2y$10$.ffNZ4sXj7ivxIY.7ZXcwOLMX4TRrtPyonL8wlPsapNLj2EWhirY6', 'user', NULL, '2023-02-27 05:48:42', '2023-02-27 05:48:42'),
(6, 'America', 'Gonzalez', '1987-09-08', 'Psicologa', 'test5@gmail.com', NULL, '$2y$10$E4Zp2/K.Y46wsm8CoqS8jeH2eUoBPTR3uudBLVCi4P5cY7rtovlJG', 'user', 'e4H7XR6iQ4NEkQGQVvDem6jihYsoP8OiJXcLmr5rhSw96ODINRKa9AUpQllH', '2023-02-27 07:37:17', '2023-02-27 07:37:17'),
(7, 'Brenda', 'Aguilar', '1987-07-08', 'Student', 'test6@gmail.com', NULL, '$2y$10$HCS3S/AQBP4wjKql.Wxku.HwTQE0uH1/U965JpCtefYl3a2TvyTba', 'user', NULL, '2023-02-27 09:50:26', '2023-02-27 09:50:26'),
(8, 'Robert', 'DeNiro', '1976-12-19', 'Actor', 'test7@gmail.com', NULL, '$2y$10$wff716ky0gw7iqFuBjBZpu/Qu3xbYhXU.bNKd8cupi7LTkNm/VINS', 'user', NULL, '2023-03-13 03:50:02', '2023-03-13 03:50:02'),
(9, 'Jhoanna', 'Lemus', '1984-08-26', 'Nurse', 'lemusvillagrana.pamela14@gmail.com', NULL, '$2y$10$PrgO.oH1vsvszjA3Got2.urMo.bAva4KHZG.RnWQzTO5oeW3UQe/u', 'user', 'MSbJX8KGon7ptDnNCZOq7XlQ1wRgbWpDZNG1NtU0pTfxhoy0KdebhHBb2wLQ', '2023-04-09 04:32:01', '2023-04-09 06:07:50'),
(10, 'Molly', 'Lion', '1995-05-06', 'Survivor', 'test8@gmail.com', NULL, '$2y$10$LBGFBeM2tYTgA82nwpDe4uKJDGrbG4Ov00bQuN3glR4buNVJ2/U9W', 'user', NULL, '2023-04-09 06:22:24', '2023-04-09 06:22:24');
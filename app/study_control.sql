-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-01-2018 a las 16:38:30
-- Versión del servidor: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- Versión de PHP: 7.0.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `study_control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_periods`
--

CREATE TABLE `academic_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `academic_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactivated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `min_section` int(11) NOT NULL DEFAULT '10',
  `max_section` int(11) NOT NULL DEFAULT '20',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('sub_director','director') COLLATE utf8mb4_unicode_ci NOT NULL,
  `people_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` enum('1er','2do','3ero','4to','5to','6to') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `academic_period_id` int(10) UNSIGNED NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(10) UNSIGNED NOT NULL,
  `materia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2017_01_22_174937_create_grades_table', 1),
(28, '2018_01_22_170249_create_people_table', 1),
(29, '2018_01_22_173042_create_materias_table', 1),
(30, '2018_01_22_173247_create_teachers_table', 1),
(31, '2018_01_22_173259_create_workers_table', 1),
(32, '2018_01_22_173323_create_directors_table', 1),
(33, '2018_01_22_173942_create_sections_table', 1),
(34, '2018_01_22_174124_create_academic_periods_table', 1),
(35, '2018_01_22_174400_create_representatives_table', 1),
(36, '2018_01_22_174434_create_students_table', 1),
(37, '2018_01_22_181228_create_inscriptions_table', 1),
(38, '2018_01_22_183603_create_teacher_materias_table', 1),
(39, '2018_01_22_194147_create_notes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_lapse_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_second_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_third_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscription_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Female','Male') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_local` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_movil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representatives`
--

CREATE TABLE `representatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` enum('mother','father','assistant') COLLATE utf8mb4_unicode_ci NOT NULL,
  `people_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section` enum('A','B','C') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `diseases` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `people_id` int(10) UNSIGNED NOT NULL,
  `mother_id` int(10) UNSIGNED NOT NULL,
  `father_id` int(10) UNSIGNED NOT NULL,
  `auxiliary_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `people_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_materias`
--

CREATE TABLE `teacher_materias` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `materia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('admin','teachers') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teachers',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'faviola', 'faviola@gmail.com', '$2y$10$d1NKA8ydzQglkgYkmwXHueql6BELiBoagkIAmWeEg175CpHe8dh1e', 'admin', '716iyu66e937egiy', '2018-01-23 00:37:21', '2018-01-23 00:37:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workers`
--

CREATE TABLE `workers` (
  `id` int(10) UNSIGNED NOT NULL,
  `people_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academic_periods`
--
ALTER TABLE `academic_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directors_people_id_foreign` (`people_id`);

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_student_id_foreign` (`student_id`),
  ADD KEY `inscriptions_academic_period_id_foreign` (`academic_period_id`),
  ADD KEY `inscriptions_grade_id_foreign` (`grade_id`),
  ADD KEY `inscriptions_section_id_foreign` (`section_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias_grade_id_foreign` (`grade_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_inscription_id_foreign` (`inscription_id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `representatives_people_id_foreign` (`people_id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_people_id_foreign` (`people_id`),
  ADD KEY `students_mother_id_foreign` (`mother_id`),
  ADD KEY `students_father_id_foreign` (`father_id`),
  ADD KEY `students_auxiliary_id_foreign` (`auxiliary_id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_people_id_foreign` (`people_id`);

--
-- Indices de la tabla `teacher_materias`
--
ALTER TABLE `teacher_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_materias_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_materias_materia_id_foreign` (`materia_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workers_people_id_foreign` (`people_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academic_periods`
--
ALTER TABLE `academic_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacher_materias`
--
ALTER TABLE `teacher_materias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `directors`
--
ALTER TABLE `directors`
  ADD CONSTRAINT `directors_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_academic_period_id_foreign` FOREIGN KEY (`academic_period_id`) REFERENCES `academic_periods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_inscription_id_foreign` FOREIGN KEY (`inscription_id`) REFERENCES `inscriptions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `representatives`
--
ALTER TABLE `representatives`
  ADD CONSTRAINT `representatives_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_auxiliary_id_foreign` FOREIGN KEY (`auxiliary_id`) REFERENCES `representatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_father_id_foreign` FOREIGN KEY (`father_id`) REFERENCES `representatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_mother_id_foreign` FOREIGN KEY (`mother_id`) REFERENCES `representatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `teacher_materias`
--
ALTER TABLE `teacher_materias`
  ADD CONSTRAINT `teacher_materias_materia_id_foreign` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_materias_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2019 às 21:23
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Arquitetura e Urbanismo', NULL, NULL),
(2, 'Ciências Biológicas', NULL, NULL),
(3, 'Engenharia Agrícola', NULL, NULL),
(4, 'Engenharia Civil', NULL, NULL),
(5, 'Fármacia', NULL, NULL),
(6, 'Física', NULL, NULL),
(7, 'Matemática', NULL, NULL),
(8, 'Química Industrial', NULL, NULL),
(9, 'Química Licenciatura', NULL, NULL),
(10, 'Sistemas de informação', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `matrizes_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `ementa` longtext COLLATE utf8mb4_unicode_ci,
  `periodo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `matrizes_id`, `nome`, `carga_horaria`, `ementa`, `periodo`, `created_at`, `updated_at`) VALUES
(1, 4, 'Lógica de Programação I', 60, NULL, 1, '2019-05-30 16:20:43', '2019-05-30 16:20:43'),
(2, 25, 'Cálculo I', 60, NULL, 1, '2019-06-04 15:53:14', '2019-06-05 01:42:08'),
(3, 7, 'Cálculo I', 60, NULL, 1, '2019-06-05 02:29:03', '2019-06-05 02:29:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equivalencias`
--

CREATE TABLE `equivalencias` (
  `disciplinas_id_1` int(10) UNSIGNED NOT NULL,
  `disciplinas_id_2` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `dia`, `hora_inicio`, `hora_fim`, `created_at`, `updated_at`) VALUES
(1, 'Segunda', '19:00:00', '20:40:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_turmas`
--

CREATE TABLE `horarios_turmas` (
  `horarios_id` int(10) UNSIGNED NOT NULL,
  `turmas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `horarios_turmas`
--

INSERT INTO `horarios_turmas` (`horarios_id`, `turmas_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matrizes`
--

CREATE TABLE `matrizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `cursos_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ativa` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `matrizes`
--

INSERT INTO `matrizes` (`id`, `cursos_id`, `nome`, `ativa`, `created_at`, `updated_at`) VALUES
(4, 3, '2017/1', 1, '2019-05-22 03:11:10', '2019-05-22 03:11:10'),
(7, 5, '2018/1', 1, '2019-05-22 03:21:29', '2019-05-22 03:21:29'),
(8, 6, '2003/1', 0, '2019-05-22 03:32:45', '2019-05-22 03:32:45'),
(15, 2, '2019/1', 1, '2019-05-22 03:59:49', '2019-05-22 03:59:49'),
(19, 7, '2007/1', 0, '2019-05-31 03:56:03', '2019-05-31 03:56:03'),
(20, 5, '2012/1', 0, '2019-06-03 21:20:46', '2019-06-03 21:20:46'),
(22, 10, '2005/1', 0, '2019-06-04 15:40:12', '2019-06-04 15:40:12'),
(24, 3, '2011/1', 1, '2019-06-04 16:00:26', '2019-06-04 16:00:26'),
(25, 8, '2015/1', 1, '2019-06-04 16:01:56', '2019-06-04 16:01:56'),
(26, 1, '2020/1', 1, '2019-06-05 14:55:24', '2019-06-05 14:55:24'),
(27, 10, '2015/1', 1, '2019-06-05 15:03:54', '2019-06-05 15:03:54'),
(28, 3, '2016/1', 1, '2019-06-12 01:58:25', '2019-06-12 01:58:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_26_233200_create_cursos_table', 1),
(4, '2019_03_26_233242_create_matrizes_table', 1),
(5, '2019_04_04_210407_create_disciplinas_table', 1),
(6, '2019_04_04_211145_create_pre_requisitos_table', 1),
(7, '2019_04_04_211220_create_equivalencias_table', 1),
(8, '2019_04_05_185321_create_professores_table', 1),
(9, '2019_04_05_190134_create_semestres_table', 1),
(10, '2019_04_05_191618_create_turmas_table', 1),
(11, '2019_04_23_232101_create_horarios_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pre_requisitos`
--

CREATE TABLE `pre_requisitos` (
  `disciplinas_id` int(10) UNSIGNED NOT NULL,
  `pre_requisito_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Noeli Pimentel', NULL, NULL),
(2, 'Ronaldo Del Fiaco', NULL, NULL),
(3, 'Joilson Reis', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `semestres`
--

CREATE TABLE `semestres` (
  `id` int(10) UNSIGNED NOT NULL,
  `semestre` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `semestres`
--

INSERT INTO `semestres` (`id`, `semestre`, `created_at`, `updated_at`) VALUES
(1, '2018/1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `disciplinas_id` int(10) UNSIGNED NOT NULL,
  `professores_id` int(10) UNSIGNED NOT NULL,
  `semestres_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `disciplinas_id`, `professores_id`, `semestres_id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '1', '2019-06-12 02:03:55', '2019-06-12 02:03:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CPF` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `CPF`, `email`, `password`, `_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, '12345678910', 'geminusueg@gmail.com', '$2y$10$DRqJCYgwhnaJ3JjLhDhN2Or4kU7kRtS7w3aLlwfIQwHcNjt7mYcw.', 'ighDQ8ACl2UBbG6NkRJIS6uGUr70Xb6ad5EqXgtZ', NULL, '2019-02-22 16:49:44', '2019-03-17 16:39:55'),
(6, '12345678918', 'q@gmail.com', '$2y$10$BWwsQHcghdNz7uBBtIveAOJrvYx5lV7ej1ycuyPtGr5iqXEpmP9TO', 'U81igFZH4wd0cANYjup8RaFmqt1gbnBuYDeWraQX', NULL, '2019-02-23 04:10:14', '2019-03-27 02:21:45'),
(15, '07728366041', 'ap@gmail.com', '$2y$10$hSndeudMcWqPV/D8O/RLMOVsrQRGzdEUBvEFJ5wqzI8IPZTfkEUfa', 'bxPfbq8l0Tb8LL35ww4SnXuVCeb7WOsVTrWE2ne5', NULL, '2019-02-23 15:44:22', '2019-03-15 23:27:13'),
(17, '10283501431', 'resp@gmail.com', '$2y$10$1i3wRAeejfkB.2IL5nWJ5u78o..yibthriy99JRj892byf3XxRJCe', NULL, NULL, '2019-02-27 16:04:05', '2019-02-27 16:04:05'),
(41, '56598842036', 'dyost@yahoo.com', '$2y$10$f9y3U07GLboLLz30FuOeIO8f8cWyl2soFAyJ03ZCj8a.TtCa9HgVG', NULL, NULL, '2019-03-01 15:51:53', '2019-03-01 15:51:53'),
(42, '77906556358', 'alvera12@muller.com', '$2y$10$UarEzYI4YuIqY7KODwoMdOrzhPxqsRK0Vrf2d73BLvPXxwXWgdWnK', NULL, NULL, '2019-03-01 15:51:53', '2019-03-01 15:51:53'),
(44, '70278382345', 'beier.aric@gmail.com', '$2y$10$lWClJuBWL/we5kW24FhwfuE2r9Lh.GIYw4vJM.JdGXOcYuLghXZtS', NULL, NULL, '2019-03-01 15:51:53', '2019-03-01 15:51:53'),
(45, '91550947087', 'shea.monahan@runte.com', '$2y$10$ZiJYHowdolIwroIh/jZlBOC4Nun8thzUJpjPaSxyS0Oc0MJ.RrNLO', 'LBGFZl6WAwQl7OStiITwk25GlCBVj1hKQztGS0rE', NULL, '2019-03-01 15:51:53', '2019-04-25 21:45:12'),
(46, '88670941946', 'wfarrell@herzog.info', '$2y$10$PvC9ZDBZv2UvZp.EQl4udeFe3e7l7pvc09SGo0N99c89SGvlGfckK', NULL, NULL, '2019-03-01 15:51:53', '2019-03-01 15:51:53'),
(47, '62353397393', 'jaiden.koepp@gmail.com', '$2y$10$tBjP2Lftlk7YJvKVhx2kjOb19U44ICkCllZbuUGCFQD1qDR5/I526', NULL, NULL, '2019-03-01 15:51:53', '2019-03-01 15:51:53'),
(48, '58852805317', 'krista.wintheiser@skiles.biz', '$2y$10$2mxI8M9wgKD2i7FQJUQ/7uPKFiudZVRMJiYLjc.JbP07IR23nU7Oe', NULL, NULL, '2019-03-01 15:51:53', '2019-03-01 15:51:53'),
(50, '40212268351', 'lwalsh@yahoo.com', '$2y$10$Tkc0kFIbJxwgvEshasWeAOuU3PFEuzT8gWeedp9WfPdXURlbRdHDC', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(51, '70330589610', 'mitchel41@gmail.com', '$2y$10$xB66WjAPq605gFLkeZGFfem45CIuLExwWkCW/IlqeC1lBSB8flIMK', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(52, '48429078097', 'christiansen.pattie@sawayn.com', '$2y$10$U0Trp2A8epWqdACodOlMkuRhsdbV2dytdcW2p4NFcsmsjPqXVbkT6', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(53, '48956998489', 'xander17@borer.com', '$2y$10$oGtx0qBmONmYCosS9HuTA.Jm..AfoQgEwzRi8Es47Jmi0c9K0.O.O', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(56, '47757510698', 'maynard.mohr@yahoo.com', '$2y$10$Kb5BVGuZogTwIp/Iqe/bAel72k9UuNToWCqVwFpXZhuuhAWhlhytK', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(58, '34324448608', 'king.noemie@yahoo.com', '$2y$10$5wpUSoQHtMSUqrlSOwMSXunW3YVEmnACyP2lwpLMsVS9YVhtGDir.', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(59, '77575870101', 'claudia89@hotmail.com', '$2y$10$i0pkgP9.M14qX2F6bOlleOXydlmHhZEM1QiBZwJ8SBm5CoUevs4Aa', NULL, NULL, '2019-03-01 15:51:54', '2019-03-01 15:51:54'),
(66, '12345678914', 'emailmail@gmail.com', '$2y$10$5T9mDXY616Lpl.gnvL/lluGW1YijYbxG0lDtFv/auKtmF.lxL73qu', NULL, NULL, '2019-03-16 18:06:01', '2019-03-16 18:06:01'),
(67, '15789654615', 'silverbolt@gmail.com', '$2y$10$uQ/CHNQCCkWrjY2vS8qWZ.KIHR9nvEc32Qtph0NKE.rzdCN9UYfMe', 'J3BGkCT0nmpC70eMkA0f3KYZVa9pKNaqZCsslflg', NULL, '2019-03-16 18:09:28', '2019-03-17 16:06:14'),
(68, '36589541201', 'mail@gmail.com', '$2y$10$lMKw7kqM5NW8b/UqTgLWqe.UiRkvVGWz40slqLOcHM3Pe1RfwIclW', NULL, NULL, '2019-03-16 18:28:18', '2019-03-16 18:28:18'),
(69, '45876541212', 'bb@gmail.com', '$2y$10$kzzmILYfAIDS58zFUKsW9eZWse17zaHB2u.0LsrSRleA2SZozLyaC', NULL, NULL, '2019-03-16 18:29:46', '2019-03-16 18:29:46'),
(73, '58964785412', 'mailoi@gmail.com', '$2y$10$q3uvp4eAg/PEce9aOC0BuObVsvUaZBGUD0oxZu7Ny3rJ95.xv/LZS', NULL, NULL, '2019-03-17 15:55:45', '2019-03-17 15:55:45'),
(74, '12345678911', 'emailooo@gmail.com', '$2y$10$61lZzvP9Sdhqw9vgQl.1xuTAPfps6r5FOGoVc5JoyV71HP6nTkqH6', 'U81igFZH4wd0cANYjup8RaFmqt1gbnBuYDeWraQX', NULL, '2019-03-25 16:02:26', '2019-03-27 02:20:50'),
(75, '30299051013', 'emailbemgrande@gmail.com', '$2y$10$oW0zBNMzQJo0ci1KAhvK.eXvSn9N01IGBtBaToe3Wr97XDhsez2e2', 'hYG8ZegKpHSZOAMp4FUxCCo7J6lEpZkUF24rxuTc', NULL, '2019-05-03 21:38:33', '2019-05-03 21:38:58'),
(76, '87519010058', 'aeer@gmail.com', '$2y$10$YeQIuTCZTNPn8/zl.U3M8.ATzXI.OcvkX8OVCzxnyxdynOZPAJVNm', NULL, NULL, '2019-06-12 01:58:02', '2019-06-12 01:58:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplinas_matrizes_id_foreign` (`matrizes_id`);

--
-- Indexes for table `equivalencias`
--
ALTER TABLE `equivalencias`
  ADD KEY `equivalencias_disciplinas_id_1_foreign` (`disciplinas_id_1`),
  ADD KEY `equivalencias_disciplinas_id_2_foreign` (`disciplinas_id_2`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrizes`
--
ALTER TABLE `matrizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matrizes_cursos_id_foreign` (`cursos_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pre_requisitos`
--
ALTER TABLE `pre_requisitos`
  ADD KEY `pre_requisitos_disciplinas_id_foreign` (`disciplinas_id`),
  ADD KEY `pre_requisitos_pre_requisito_id_foreign` (`pre_requisito_id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turmas_disciplinas_id_foreign` (`disciplinas_id`),
  ADD KEY `turmas_professores_id_foreign` (`professores_id`),
  ADD KEY `turmas_semestres_id_foreign` (`semestres_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matrizes`
--
ALTER TABLE `matrizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_matrizes_id_foreign` FOREIGN KEY (`matrizes_id`) REFERENCES `matrizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `equivalencias`
--
ALTER TABLE `equivalencias`
  ADD CONSTRAINT `equivalencias_disciplinas_id_1_foreign` FOREIGN KEY (`disciplinas_id_1`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equivalencias_disciplinas_id_2_foreign` FOREIGN KEY (`disciplinas_id_2`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matrizes`
--
ALTER TABLE `matrizes`
  ADD CONSTRAINT `matrizes_cursos_id_foreign` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pre_requisitos`
--
ALTER TABLE `pre_requisitos`
  ADD CONSTRAINT `pre_requisitos_disciplinas_id_foreign` FOREIGN KEY (`disciplinas_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pre_requisitos_pre_requisito_id_foreign` FOREIGN KEY (`pre_requisito_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_disciplinas_id_foreign` FOREIGN KEY (`disciplinas_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turmas_professores_id_foreign` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turmas_semestres_id_foreign` FOREIGN KEY (`semestres_id`) REFERENCES `semestres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

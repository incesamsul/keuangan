

INSERT INTO `akun` (`id_akun`, `no_akun`, `nama_akun`, `jenis_akun`, `created_at`, `updated_at`) VALUES
(1, 10, 'piutang', 'aktiva', '2022-02-16 13:31:31', '2022-02-16 13:31:31'),
(2, 11, 'utang', 'utang', '2022-02-16 13:43:40', '2022-02-16 13:43:40');


INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-25 03:34:44', '2021-11-25 03:56:23'),
(2, 3, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-25 03:34:44', '2021-11-25 03:56:23'),
(3, 2, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-25 03:34:44', '2021-11-25 03:56:23');



INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-25 01:06:43', '2021-12-12 10:29:52'),
(2, 'amalia', 'amalia@mail.com', NULL, '$2y$10$Pt/9r/VO830MdtDKcoN9CO7qDJDL1QrcpiJYU0Yww/X9wJLmaSUDm', 'staff', '', NULL, '2022-02-13 15:49:09', '2022-02-13 15:49:09'),
(3, 'muhammad', 'muhammad@mail.com', NULL, '$2y$10$mHsUl/K3.0bfT9zLpsP7HO5uuxXyGeZEEkOBfYrgbXkq.rz0fczbu', 'pimpinan', '', NULL, '2022-02-13 15:53:29', '2022-02-13 15:53:29');


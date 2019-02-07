/*
 Navicat Premium Data Transfer

 Source Server         : localhost_5432
 Source Server Type    : PostgreSQL
 Source Server Version : 100003
 Source Host           : localhost:5432
 Source Catalog        : apsi
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100003
 File Encoding         : 65001

 Date: 14/08/2018 10:39:17
*/


-- ----------------------------
-- Sequence structure for attributes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."attributes_id_seq";
CREATE SEQUENCE "public"."attributes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for job_parameters_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."job_parameters_id_seq";
CREATE SEQUENCE "public"."job_parameters_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jobs_id_seq";
CREATE SEQUENCE "public"."jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for parameters_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."parameters_id_seq";
CREATE SEQUENCE "public"."parameters_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for simulations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."simulations_id_seq";
CREATE SEQUENCE "public"."simulations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for uploads_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."uploads_id_seq";
CREATE SEQUENCE "public"."uploads_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS "public"."attributes";
CREATE TABLE "public"."attributes" (
  "id" int4 NOT NULL DEFAULT nextval('attributes_id_seq'::regclass),
  "parameter_id" int4 NOT NULL,
  "type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "options" varchar(255) COLLATE "pg_catalog"."default",
  "name" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of attributes
-- ----------------------------
INSERT INTO "public"."attributes" VALUES (9, 11, 'text', '2018-05-17 09:46:33', '2018-05-17 09:46:33', NULL, 'skin');
INSERT INTO "public"."attributes" VALUES (10, 11, 'options', '2018-05-17 09:46:41', '2018-05-17 09:46:41', '["bin","nsq"]', 'style');
INSERT INTO "public"."attributes" VALUES (11, 12, 'options', '2018-05-17 09:49:02', '2018-05-17 09:49:02', '["delay","every","check","once","cluster","include","exclude","page","one","binsize"]', 'keyword');
INSERT INTO "public"."attributes" VALUES (12, 12, 'text', '2018-05-17 09:49:24', '2018-05-17 09:49:24', NULL, 'values');
INSERT INTO "public"."attributes" VALUES (6, 10, 'options', '2018-05-17 09:45:13', '2018-05-17 09:45:13', '["p","f","s","m"]', 'x');
INSERT INTO "public"."attributes" VALUES (7, 10, 'options', '2018-05-17 09:45:16', '2018-05-17 09:45:16', '["p","f","s","m"]', 'y');
INSERT INTO "public"."attributes" VALUES (8, 10, 'options', '2018-05-17 09:45:18', '2018-05-17 09:45:18', '["p","f","s","m"]', 'z');
INSERT INTO "public"."attributes" VALUES (13, 8, 'options', '2018-05-17 12:13:59', '2018-05-17 12:13:59', '["angle","atomic","body","bond","charge","dipole","dpd","edpd","mdpd","tdpd","electron","ellipsoid","full","line","meso","molecular","peri","smd","sphere","template","tri","wavepacket"]', 'style');
INSERT INTO "public"."attributes" VALUES (14, 8, 'text', '2018-05-17 12:14:05', '2018-05-17 12:14:05', NULL, 'args');
INSERT INTO "public"."attributes" VALUES (15, 13, 'options', '2018-05-18 09:09:04', '2018-05-18 09:09:04', '["none","sc","bcc","fcc","hcp","diamond","sq","sq2","hex","custom"]', 'style');
INSERT INTO "public"."attributes" VALUES (16, 13, 'text', '2018-05-18 09:09:14', '2018-05-18 09:09:14', NULL, 'scale');
INSERT INTO "public"."attributes" VALUES (5, 9, 'options', '2018-05-17 09:42:42', '2018-05-17 09:42:42', '["lj","real","metal","si","cgs","electron","micro","nano"]', 'style');
INSERT INTO "public"."attributes" VALUES (17, 13, 'options', '2018-05-18 13:53:21', '2018-05-18 13:53:21', '["origin","orient","spacing","a1","a2","a3","basis"]', 'keyword');
INSERT INTO "public"."attributes" VALUES (18, 13, 'text', '2018-05-18 13:53:29', '2018-05-18 13:53:29', NULL, 'values');
INSERT INTO "public"."attributes" VALUES (19, 13, 'options', '2018-05-18 13:53:32', '2018-05-18 13:53:32', '["origin","orient","spacing","a1","a2","a3","basis"]', 'keyword');
INSERT INTO "public"."attributes" VALUES (20, 13, 'text', '2018-05-18 13:53:33', '2018-05-18 13:53:33', NULL, 'values');
INSERT INTO "public"."attributes" VALUES (21, 13, 'options', '2018-05-18 13:53:35', '2018-05-18 13:53:35', '["origin","orient","spacing","a1","a2","a3","basis"]', 'keyword');
INSERT INTO "public"."attributes" VALUES (22, 13, 'text', '2018-05-18 13:53:37', '2018-05-18 13:53:37', NULL, 'values');
INSERT INTO "public"."attributes" VALUES (23, 13, 'options', '2018-05-18 13:53:38', '2018-05-18 13:53:38', '["origin","orient","spacing","a1","a2","a3","basis"]', 'keyword');
INSERT INTO "public"."attributes" VALUES (24, 13, 'text', '2018-05-18 13:53:40', '2018-05-18 13:53:40', NULL, 'values');

-- ----------------------------
-- Table structure for job_parameters
-- ----------------------------
DROP TABLE IF EXISTS "public"."job_parameters";
CREATE TABLE "public"."job_parameters" (
  "id" int4 NOT NULL DEFAULT nextval('job_parameters_id_seq'::regclass),
  "job_id" int4 NOT NULL,
  "name" int4 NOT NULL,
  "value" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."jobs";
CREATE TABLE "public"."jobs" (
  "id" int4 NOT NULL DEFAULT nextval('jobs_id_seq'::regclass),
  "job_number" int4 NOT NULL,
  "user_id" int4 NOT NULL,
  "simulation_id" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2018_03_25_194057_create_simulations_table', 1);
INSERT INTO "public"."migrations" VALUES (4, '2018_03_25_195403_create_uploads_table', 1);
INSERT INTO "public"."migrations" VALUES (5, '2018_03_25_204058_create_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (6, '2018_03_28_014836_create_parameters_table', 1);
INSERT INTO "public"."migrations" VALUES (7, '2018_03_28_014837_create_attributes_table', 1);
INSERT INTO "public"."migrations" VALUES (8, '2018_03_28_015334_create_simulation_parameter_table', 1);
INSERT INTO "public"."migrations" VALUES (9, '2018_04_11_211335_add_role_to_user', 2);
INSERT INTO "public"."migrations" VALUES (10, '2018_04_12_081418_add_name_status_to_jobs', 3);
INSERT INTO "public"."migrations" VALUES (11, '2018_04_12_114437_create_job_parameters_table', 4);

-- ----------------------------
-- Table structure for parameters
-- ----------------------------
DROP TABLE IF EXISTS "public"."parameters";
CREATE TABLE "public"."parameters" (
  "id" int4 NOT NULL DEFAULT nextval('parameters_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of parameters
-- ----------------------------
INSERT INTO "public"."parameters" VALUES (8, 'atom_style', '2018-05-17 09:14:33', '2018-05-17 09:14:33');
INSERT INTO "public"."parameters" VALUES (9, 'units', '2018-05-17 09:41:30', '2018-05-17 09:41:30');
INSERT INTO "public"."parameters" VALUES (10, 'boundary', '2018-05-17 09:44:53', '2018-05-17 09:44:53');
INSERT INTO "public"."parameters" VALUES (11, 'neighbor', '2018-05-17 09:46:21', '2018-05-17 09:46:21');
INSERT INTO "public"."parameters" VALUES (12, 'neigh_modify', '2018-05-17 09:48:21', '2018-05-17 09:48:21');
INSERT INTO "public"."parameters" VALUES (13, 'lattice', '2018-05-18 09:08:27', '2018-05-18 09:08:27');
INSERT INTO "public"."parameters" VALUES (14, 'dimension', '2018-05-22 00:08:56', '2018-05-22 00:08:56');
INSERT INTO "public"."parameters" VALUES (15, 'create_box', '2018-05-22 00:15:56', '2018-05-22 00:15:57');
INSERT INTO "public"."parameters" VALUES (16, 'create_atoms', '2018-05-22 00:18:30', '2018-05-22 00:18:31');
INSERT INTO "public"."parameters" VALUES (17, 'mass', '2018-05-22 00:23:42', '2018-05-22 00:23:43');
INSERT INTO "public"."parameters" VALUES (18, 'pair_style', '2018-05-22 00:27:57', '2018-05-22 00:27:58');
INSERT INTO "public"."parameters" VALUES (19, 'pair_coeff', '2018-05-22 00:29:55', '2018-05-22 00:29:55');
INSERT INTO "public"."parameters" VALUES (20, 'region', '2018-05-22 00:33:14', '2018-05-22 00:33:14');
INSERT INTO "public"."parameters" VALUES (21, 'group', '2018-05-22 00:51:53', '2018-05-22 00:51:54');
INSERT INTO "public"."parameters" VALUES (22, 'set', '2018-05-22 01:07:42', '2018-05-22 01:07:43');
INSERT INTO "public"."parameters" VALUES (23, 'compute', '2018-05-22 01:20:47', '2018-05-22 01:20:48');
INSERT INTO "public"."parameters" VALUES (24, 'velocity', '2018-05-22 01:26:06', '2018-05-22 01:26:07');
INSERT INTO "public"."parameters" VALUES (25, 'fix', '2018-05-22 01:37:12', '2018-05-22 01:37:13');
INSERT INTO "public"."parameters" VALUES (26, 'fix_modify', '2018-05-22 01:45:10', '2018-05-22 01:45:10');
INSERT INTO "public"."parameters" VALUES (27, 'timestep', '2018-05-22 01:47:40', '2018-05-22 01:47:41');
INSERT INTO "public"."parameters" VALUES (28, 'thermo', '2018-05-22 01:48:13', '2018-05-22 01:48:13');
INSERT INTO "public"."parameters" VALUES (29, 'thermo_modify', '2018-05-22 01:51:06', '2018-05-22 01:51:07');
INSERT INTO "public"."parameters" VALUES (30, 'run', '2018-05-22 01:52:18', '2018-05-22 01:52:19');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for simulation_parameter
-- ----------------------------
DROP TABLE IF EXISTS "public"."simulation_parameter";
CREATE TABLE "public"."simulation_parameter" (
  "simulation_id" int4 NOT NULL,
  "parameter_id" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of simulation_parameter
-- ----------------------------
INSERT INTO "public"."simulation_parameter" VALUES (1, 1, '2018-04-05 14:31:08', '2018-04-05 14:31:09');
INSERT INTO "public"."simulation_parameter" VALUES (1, 2, '2018-04-05 14:34:06', '2018-04-05 14:34:07');
INSERT INTO "public"."simulation_parameter" VALUES (4, 8, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 9, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 10, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 11, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 12, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 13, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 14, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 15, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 16, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 17, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 18, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 19, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 20, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 21, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 22, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 23, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 24, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 25, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 26, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 27, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 28, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 29, NULL, NULL);
INSERT INTO "public"."simulation_parameter" VALUES (4, 30, NULL, NULL);

-- ----------------------------
-- Table structure for simulations
-- ----------------------------
DROP TABLE IF EXISTS "public"."simulations";
CREATE TABLE "public"."simulations" (
  "id" int4 NOT NULL DEFAULT nextval('simulations_id_seq'::regclass),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "image" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of simulations
-- ----------------------------
INSERT INTO "public"."simulations" VALUES (3, 'Hydrocarbons', 'hydrocarbons', 'Hidrocarbon', 1, '2018-05-17 03:03:42', '2018-05-17 03:03:42');
INSERT INTO "public"."simulations" VALUES (4, 'Tes Simulasi Satu', 'tes-simulasi-satu', 'Sebuah testing dari simulasi', 1, '2018-05-17 03:44:04', '2018-05-17 03:44:04');

-- ----------------------------
-- Table structure for uploads
-- ----------------------------
DROP TABLE IF EXISTS "public"."uploads";
CREATE TABLE "public"."uploads" (
  "id" int4 NOT NULL DEFAULT nextval('uploads_id_seq'::regclass),
  "file_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "client_file_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "extension" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "size" int4 NOT NULL,
  "mime" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO "public"."uploads" VALUES (1, 'lammps.png', 'lammps.png', 'png', 125, 'IMAGE/JPEG', '2018-04-12 15:30:29', '2018-04-12 15:30:29');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "role" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'user'::character varying
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (7, 'Cipto', 'fikri.miqbal23@gmail.com', '$2y$10$F0GUH0tRPQVillJRYegYo.cebeT0ZbiyI1O5yg3P1ziBOHIk5QU8O', 'KQti0yjlbrBWQBJrPfMJmA0tkvUc31ebR7tGF5O897cODFV3SOFWl2wx4HoJ', '2018-04-12 07:55:02', '2018-04-12 07:55:02', 'user');
INSERT INTO "public"."users" VALUES (8, 'Adi', 'adiprnm@example.com', '$2y$10$.eAY13KPQ3k1ynCbN8C.Auqm0siFqyNI81HTJTFzxJBmzPj/eBoES', NULL, '2018-04-12 16:32:54', '2018-04-12 16:32:54', 'user');
INSERT INTO "public"."users" VALUES (1, 'Fikri Muhammad Iqbal', 'gamer.fikri@gmail.com', '$2y$10$Gy4nj1R8Q/CbkUzfd/KjMu8QKjszakmhkQlKIU1TX0Ge.jMhJ5ywe', 'CbXmyx25FHh6Uu7376Ds1aos3uQIDaGqPjFcncef546mHwy2LNNN00BSMOm8', '2018-04-05 13:52:28', '2018-04-05 13:52:28', 'admin');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."attributes_id_seq"
OWNED BY "public"."attributes"."id";
SELECT setval('"public"."attributes_id_seq"', 25, true);
ALTER SEQUENCE "public"."job_parameters_id_seq"
OWNED BY "public"."job_parameters"."id";
SELECT setval('"public"."job_parameters_id_seq"', 2, false);
ALTER SEQUENCE "public"."jobs_id_seq"
OWNED BY "public"."jobs"."id";
SELECT setval('"public"."jobs_id_seq"', 16, true);
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 12, true);
ALTER SEQUENCE "public"."parameters_id_seq"
OWNED BY "public"."parameters"."id";
SELECT setval('"public"."parameters_id_seq"', 17, true);
ALTER SEQUENCE "public"."simulations_id_seq"
OWNED BY "public"."simulations"."id";
SELECT setval('"public"."simulations_id_seq"', 5, true);
ALTER SEQUENCE "public"."uploads_id_seq"
OWNED BY "public"."uploads"."id";
SELECT setval('"public"."uploads_id_seq"', 2, false);
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 9, true);

-- ----------------------------
-- Checks structure for table attributes
-- ----------------------------
ALTER TABLE "public"."attributes" ADD CONSTRAINT "attributes_type_check" CHECK (((type)::text = ANY ((ARRAY['text'::character varying, 'number'::character varying, 'options'::character varying])::text[])));

-- ----------------------------
-- Primary Key structure for table attributes
-- ----------------------------
ALTER TABLE "public"."attributes" ADD CONSTRAINT "attributes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table job_parameters
-- ----------------------------
ALTER TABLE "public"."job_parameters" ADD CONSTRAINT "job_parameters_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Checks structure for table jobs
-- ----------------------------
ALTER TABLE "public"."jobs" ADD CONSTRAINT "jobs_status_check" CHECK (((status)::text = ANY ((ARRAY['running'::character varying, 'canceled'::character varying, 'finished'::character varying, 'queued'::character varying])::text[])));

-- ----------------------------
-- Primary Key structure for table jobs
-- ----------------------------
ALTER TABLE "public"."jobs" ADD CONSTRAINT "jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table parameters
-- ----------------------------
ALTER TABLE "public"."parameters" ADD CONSTRAINT "parameters_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table simulations
-- ----------------------------
ALTER TABLE "public"."simulations" ADD CONSTRAINT "simulations_slug_unique" UNIQUE ("slug");

-- ----------------------------
-- Primary Key structure for table simulations
-- ----------------------------
ALTER TABLE "public"."simulations" ADD CONSTRAINT "simulations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table uploads
-- ----------------------------
CREATE INDEX "uploads_extension_index" ON "public"."uploads" USING btree (
  "extension" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table uploads
-- ----------------------------
ALTER TABLE "public"."uploads" ADD CONSTRAINT "uploads_file_name_unique" UNIQUE ("file_name");

-- ----------------------------
-- Primary Key structure for table uploads
-- ----------------------------
ALTER TABLE "public"."uploads" ADD CONSTRAINT "uploads_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Checks structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_role_check" CHECK (((role)::text = ANY ((ARRAY['admin'::character varying, 'user'::character varying])::text[])));

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

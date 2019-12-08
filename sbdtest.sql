--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 11.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: list; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.list (
    id integer NOT NULL,
    id_jenis character varying NOT NULL,
    id_merk character varying NOT NULL,
    tipe character varying(255) NOT NULL,
    harga character varying(255) NOT NULL
);


ALTER TABLE public.list OWNER TO postgres;

--
-- Name: jumlah_merk; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.jumlah_merk AS
 SELECT count(list.id_merk) AS count,
    list.id_merk
   FROM public.list
  GROUP BY list.id_merk;


ALTER TABLE public.jumlah_merk OWNER TO postgres;

--
-- Name: merk; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.merk (
    no integer NOT NULL,
    nama_merk character varying(255) NOT NULL,
    kode_merk character varying(8) NOT NULL
);


ALTER TABLE public.merk OWNER TO postgres;

--
-- Name: brand_count; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.brand_count AS
 SELECT merk.no,
    merk.nama_merk,
    merk.kode_merk,
    jumlah_merk.count,
    jumlah_merk.id_merk
   FROM (public.merk
     LEFT JOIN public.jumlah_merk ON (((merk.kode_merk)::text = (jumlah_merk.id_merk)::text)));


ALTER TABLE public.brand_count OWNER TO postgres;

--
-- Name: list_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.list_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.list_id_seq OWNER TO postgres;

--
-- Name: list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.list_id_seq OWNED BY public.list.id;


--
-- Name: login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.login (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.login OWNER TO postgres;

--
-- Name: login_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.login_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.login_id_seq OWNER TO postgres;

--
-- Name: login_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.login_id_seq OWNED BY public.login.id;


--
-- Name: merk_no_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.merk_no_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.merk_no_seq OWNER TO postgres;

--
-- Name: merk_no_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.merk_no_seq OWNED BY public.merk.no;


--
-- Name: riwayat_servis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.riwayat_servis (
    id integer NOT NULL,
    serial_id integer,
    nama_barang character varying(50),
    merk_barang character varying(50),
    harga integer,
    stock integer
);


ALTER TABLE public.riwayat_servis OWNER TO postgres;

--
-- Name: riwayat_servis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.riwayat_servis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.riwayat_servis_id_seq OWNER TO postgres;

--
-- Name: riwayat_servis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.riwayat_servis_id_seq OWNED BY public.riwayat_servis.id;


--
-- Name: serial_id; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.serial_id
    START WITH 85
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 929844903
    CACHE 85;


ALTER TABLE public.serial_id OWNER TO postgres;

--
-- Name: spareparts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.spareparts (
    id integer NOT NULL,
    jenis character varying(100) NOT NULL,
    merk character varying(100) NOT NULL,
    tipe character varying(100) NOT NULL,
    harga integer NOT NULL
);


ALTER TABLE public.spareparts OWNER TO postgres;

--
-- Name: spareparts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.spareparts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.spareparts_id_seq OWNER TO postgres;

--
-- Name: spareparts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.spareparts_id_seq OWNED BY public.spareparts.id;


--
-- Name: tipe; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipe (
    no integer NOT NULL,
    nama_jenis character varying(255) NOT NULL,
    kode_part character varying(7) NOT NULL
);


ALTER TABLE public.tipe OWNER TO postgres;

--
-- Name: tipe_no_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipe_no_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipe_no_seq OWNER TO postgres;

--
-- Name: tipe_no_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipe_no_seq OWNED BY public.tipe.no;


--
-- Name: list id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.list ALTER COLUMN id SET DEFAULT nextval('public.list_id_seq'::regclass);


--
-- Name: login id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.login ALTER COLUMN id SET DEFAULT nextval('public.login_id_seq'::regclass);


--
-- Name: merk no; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.merk ALTER COLUMN no SET DEFAULT nextval('public.merk_no_seq'::regclass);


--
-- Name: riwayat_servis id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riwayat_servis ALTER COLUMN id SET DEFAULT nextval('public.riwayat_servis_id_seq'::regclass);


--
-- Name: spareparts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.spareparts ALTER COLUMN id SET DEFAULT nextval('public.spareparts_id_seq'::regclass);


--
-- Name: tipe no; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipe ALTER COLUMN no SET DEFAULT nextval('public.tipe_no_seq'::regclass);


--
-- Name: login login_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.login
    ADD CONSTRAINT login_pkey PRIMARY KEY (id);


--
-- Name: merk merk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.merk
    ADD CONSTRAINT merk_pkey PRIMARY KEY (kode_merk);


--
-- Name: tipe tipe_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipe
    ADD CONSTRAINT tipe_pkey PRIMARY KEY (kode_part);


--
-- PostgreSQL database dump complete
--


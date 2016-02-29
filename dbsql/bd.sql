--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.1
-- Dumped by pg_dump version 9.4.1
-- Started on 2015-04-17 11:23:24

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 191 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2107 (class 0 OID 0)
-- Dependencies: 191
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 190 (class 1259 OID 24710)
-- Name: banco; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE banco (
);


ALTER TABLE banco OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16394)
-- Name: clientes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE clientes (
    id_gruposuarez integer NOT NULL,
    cedula integer,
    nom_cliente character varying,
    ape_cliente character varying,
    fe_cumpleannos date,
    direccion character varying,
    telefono character varying,
    celular character varying,
    correo character varying,
    telefono2 character varying,
    id_cliente integer NOT NULL,
    id_status integer
);


ALTER TABLE clientes OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 24652)
-- Name: clientes_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE clientes_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clientes_id_cliente_seq OWNER TO postgres;

--
-- TOC entry 2108 (class 0 OID 0)
-- Dependencies: 185
-- Name: clientes_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE clientes_id_cliente_seq OWNED BY clientes.id_cliente;


--
-- TOC entry 174 (class 1259 OID 24587)
-- Name: cobros; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cobros (
    id_cobros integer NOT NULL
);


ALTER TABLE cobros OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 24585)
-- Name: cobros_id_cobros_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cobros_id_cobros_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cobros_id_cobros_seq OWNER TO postgres;

--
-- TOC entry 2109 (class 0 OID 0)
-- Dependencies: 173
-- Name: cobros_id_cobros_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cobros_id_cobros_seq OWNED BY cobros.id_cobros;


--
-- TOC entry 178 (class 1259 OID 24607)
-- Name: cuidad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cuidad (
    id_ciudad integer NOT NULL,
    descripcion character varying
);


ALTER TABLE cuidad OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 24678)
-- Name: cuidad_id_ciudad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cuidad_id_ciudad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuidad_id_ciudad_seq OWNER TO postgres;

--
-- TOC entry 2110 (class 0 OID 0)
-- Dependencies: 187
-- Name: cuidad_id_ciudad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cuidad_id_ciudad_seq OWNED BY cuidad.id_ciudad;


--
-- TOC entry 189 (class 1259 OID 24696)
-- Name: gestioncorreos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gestioncorreos (
    id_gestion_correos integer NOT NULL,
    descripcion character varying,
    id_tipo_gestion integer
);


ALTER TABLE gestioncorreos OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 24694)
-- Name: gestioncorreos_id_gestion_correos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE gestioncorreos_id_gestion_correos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE gestioncorreos_id_gestion_correos_seq OWNER TO postgres;

--
-- TOC entry 2111 (class 0 OID 0)
-- Dependencies: 188
-- Name: gestioncorreos_id_gestion_correos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE gestioncorreos_id_gestion_correos_seq OWNED BY gestioncorreos.id_gestion_correos;


--
-- TOC entry 176 (class 1259 OID 24595)
-- Name: gestionllamadas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gestionllamadas (
    id_gestion_llamadas integer NOT NULL,
    descripcion character varying,
    id_tipo_gestion integer
);


ALTER TABLE gestionllamadas OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 24593)
-- Name: gestionllamadas_id_gestion_llamadas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE gestionllamadas_id_gestion_llamadas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE gestionllamadas_id_gestion_llamadas_seq OWNER TO postgres;

--
-- TOC entry 2112 (class 0 OID 0)
-- Dependencies: 175
-- Name: gestionllamadas_id_gestion_llamadas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE gestionllamadas_id_gestion_llamadas_seq OWNED BY gestionllamadas.id_gestion_llamadas;


--
-- TOC entry 177 (class 1259 OID 24604)
-- Name: pais; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pais (
    id_pais integer NOT NULL,
    nom_pais character varying
);


ALTER TABLE pais OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 24610)
-- Name: pais_id_pais_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pais_id_pais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pais_id_pais_seq OWNER TO postgres;

--
-- TOC entry 2113 (class 0 OID 0)
-- Dependencies: 179
-- Name: pais_id_pais_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pais_id_pais_seq OWNED BY pais.id_pais;


--
-- TOC entry 181 (class 1259 OID 24624)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE roles (
);


ALTER TABLE roles OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 24665)
-- Name: status_cliente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE status_cliente (
    id_status_cliente integer NOT NULL,
    descripcion character varying
);


ALTER TABLE status_cliente OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 24638)
-- Name: tipogestion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipogestion (
    id_tipo_gestion integer NOT NULL,
    descripcion character varying
);


ALTER TABLE tipogestion OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 24641)
-- Name: tipogestion_id_tipo_gestion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipogestion_id_tipo_gestion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipogestion_id_tipo_gestion_seq OWNER TO postgres;

--
-- TOC entry 2114 (class 0 OID 0)
-- Dependencies: 184
-- Name: tipogestion_id_tipo_gestion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipogestion_id_tipo_gestion_seq OWNED BY tipogestion.id_tipo_gestion;


--
-- TOC entry 180 (class 1259 OID 24621)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    id_usuario integer NOT NULL,
    nombre character varying,
    apellido character varying,
    cedula integer,
    id_rol integer
);


ALTER TABLE usuarios OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 24627)
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuarios_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 2115 (class 0 OID 0)
-- Dependencies: 182
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_usuario_seq OWNED BY usuarios.id_usuario;


--
-- TOC entry 1943 (class 2604 OID 24654)
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clientes ALTER COLUMN id_cliente SET DEFAULT nextval('clientes_id_cliente_seq'::regclass);


--
-- TOC entry 1944 (class 2604 OID 24590)
-- Name: id_cobros; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cobros ALTER COLUMN id_cobros SET DEFAULT nextval('cobros_id_cobros_seq'::regclass);


--
-- TOC entry 1947 (class 2604 OID 24680)
-- Name: id_ciudad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cuidad ALTER COLUMN id_ciudad SET DEFAULT nextval('cuidad_id_ciudad_seq'::regclass);


--
-- TOC entry 1950 (class 2604 OID 24699)
-- Name: id_gestion_correos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gestioncorreos ALTER COLUMN id_gestion_correos SET DEFAULT nextval('gestioncorreos_id_gestion_correos_seq'::regclass);


--
-- TOC entry 1945 (class 2604 OID 24598)
-- Name: id_gestion_llamadas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gestionllamadas ALTER COLUMN id_gestion_llamadas SET DEFAULT nextval('gestionllamadas_id_gestion_llamadas_seq'::regclass);


--
-- TOC entry 1946 (class 2604 OID 24612)
-- Name: id_pais; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pais ALTER COLUMN id_pais SET DEFAULT nextval('pais_id_pais_seq'::regclass);


--
-- TOC entry 1949 (class 2604 OID 24643)
-- Name: id_tipo_gestion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipogestion ALTER COLUMN id_tipo_gestion SET DEFAULT nextval('tipogestion_id_tipo_gestion_seq'::regclass);


--
-- TOC entry 1948 (class 2604 OID 24629)
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('usuarios_id_usuario_seq'::regclass);


--
-- TOC entry 2099 (class 0 OID 24710)
-- Dependencies: 190
-- Data for Name: banco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY banco  FROM stdin;
\.


--
-- TOC entry 2081 (class 0 OID 16394)
-- Dependencies: 172
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY clientes (id_gruposuarez, cedula, nom_cliente, ape_cliente, fe_cumpleannos, direccion, telefono, celular, correo, telefono2, id_cliente, id_status) FROM stdin;
1	17144060	Gabriela	Ilarreta	1985-07-21	La Arboleda			gabrielailarreta@gmail.com	\N	1	\N
2	16852177	Prueba	P4545	1985-07-21	La Arboleda	04265124654	658745587	gabrielailarreta@gmail.com	\N	2	\N
\.


--
-- TOC entry 2116 (class 0 OID 0)
-- Dependencies: 185
-- Name: clientes_id_cliente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('clientes_id_cliente_seq', 2, true);


--
-- TOC entry 2083 (class 0 OID 24587)
-- Dependencies: 174
-- Data for Name: cobros; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cobros (id_cobros) FROM stdin;
\.


--
-- TOC entry 2117 (class 0 OID 0)
-- Dependencies: 173
-- Name: cobros_id_cobros_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cobros_id_cobros_seq', 1, false);


--
-- TOC entry 2087 (class 0 OID 24607)
-- Dependencies: 178
-- Data for Name: cuidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cuidad (id_ciudad, descripcion) FROM stdin;
\.


--
-- TOC entry 2118 (class 0 OID 0)
-- Dependencies: 187
-- Name: cuidad_id_ciudad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cuidad_id_ciudad_seq', 1, false);


--
-- TOC entry 2098 (class 0 OID 24696)
-- Dependencies: 189
-- Data for Name: gestioncorreos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY gestioncorreos (id_gestion_correos, descripcion, id_tipo_gestion) FROM stdin;
1	 “Estimado (nombre cliente), Por la presente le informamos que según nuestro registro tiene letra próxima a vencer con monto correspondiente a (insertar monto) para el día (insertar día). Recuerde que para poder realizar su pago puede acercarse a nuestras oficinas en Vía España, Edificio los Toneles, Planta Baja ó realizar un depósito directo a la siguiente cuenta (ingresar detalles de cuenta). No olvide enviar su correo de aviso de pago si decide abonar directamente a los siguientes correos obonilla@gsuarez.com, orodriguez@gsuarez.com.  Esperamos que tenga un excelente día. Atentamente, Departamento de Cobros Grupo Suárez”	1
2	“Estimado (nombre del cliente), Le informamos que según nuestro registro su letra venció el día de ayer. Recuerde que para poder realizar su pago puede acercarse a nuestras oficinas en Vía España, Edificio los Toneles, Planta Baja ó realizar un depósito directo a la siguiente cuenta (ingresar detalles de cuenta). No olvide enviar su correo de aviso de pago si decide abonar directamente a los siguientes correos obonilla@gsuarez.com, orodriguez@gsuarez.com.  Si ya ha realizado su pago, le agradecemos nos envíe un comprobante de pago a los correos previamente mencionados o nos contacte al (número oficina cobros) para poder actualizar su cuenta.  Esperamos que tenga un excelente día. Atentamente, Departamento de Cobros Grupo Suárez”	2
\.


--
-- TOC entry 2119 (class 0 OID 0)
-- Dependencies: 188
-- Name: gestioncorreos_id_gestion_correos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('gestioncorreos_id_gestion_correos_seq', 2, true);


--
-- TOC entry 2085 (class 0 OID 24595)
-- Dependencies: 176
-- Data for Name: gestionllamadas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY gestionllamadas (id_gestion_llamadas, descripcion, id_tipo_gestion) FROM stdin;
1	Por favor Cancele	2
2	'Cut,Copy,Paste,Pastetext,Blocktag,Fontface,FontSize,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,Align,List,Outdent,Indent,Emot', 	4
\.


--
-- TOC entry 2120 (class 0 OID 0)
-- Dependencies: 175
-- Name: gestionllamadas_id_gestion_llamadas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('gestionllamadas_id_gestion_llamadas_seq', 2, true);


--
-- TOC entry 2086 (class 0 OID 24604)
-- Dependencies: 177
-- Data for Name: pais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pais (id_pais, nom_pais) FROM stdin;
1	PANAMA
\.


--
-- TOC entry 2121 (class 0 OID 0)
-- Dependencies: 179
-- Name: pais_id_pais_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pais_id_pais_seq', 1, true);


--
-- TOC entry 2090 (class 0 OID 24624)
-- Dependencies: 181
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY roles  FROM stdin;
\.


--
-- TOC entry 2095 (class 0 OID 24665)
-- Dependencies: 186
-- Data for Name: status_cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY status_cliente (id_status_cliente, descripcion) FROM stdin;
\.


--
-- TOC entry 2092 (class 0 OID 24638)
-- Dependencies: 183
-- Data for Name: tipogestion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipogestion (id_tipo_gestion, descripcion) FROM stdin;
2	Email 60 DIAS
3	Email 90 DIAS
4	LLAMADAS 30 DIAS
5	LLAMADAS 60 DIAS
6	LLAMADAS 90 DIAS
1	Email 30 DIAS
\.


--
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 184
-- Name: tipogestion_id_tipo_gestion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipogestion_id_tipo_gestion_seq', 6, true);


--
-- TOC entry 2089 (class 0 OID 24621)
-- Dependencies: 180
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuarios (id_usuario, nombre, apellido, cedula, id_rol) FROM stdin;
\.


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 182
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_usuario_seq', 1, false);


--
-- TOC entry 1960 (class 2606 OID 24688)
-- Name: id_ciudad; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cuidad
    ADD CONSTRAINT id_ciudad PRIMARY KEY (id_ciudad);


--
-- TOC entry 1958 (class 2606 OID 24617)
-- Name: id_pais; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pais
    ADD CONSTRAINT id_pais PRIMARY KEY (id_pais);


--
-- TOC entry 1968 (class 2606 OID 24704)
-- Name: pk_gestion_correos; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gestioncorreos
    ADD CONSTRAINT pk_gestion_correos PRIMARY KEY (id_gestion_correos);


--
-- TOC entry 1956 (class 2606 OID 24603)
-- Name: pk_gestion_llamadas; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gestionllamadas
    ADD CONSTRAINT pk_gestion_llamadas PRIMARY KEY (id_gestion_llamadas);


--
-- TOC entry 1954 (class 2606 OID 24592)
-- Name: pk_id_cobros; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cobros
    ADD CONSTRAINT pk_id_cobros PRIMARY KEY (id_cobros);


--
-- TOC entry 1952 (class 2606 OID 24663)
-- Name: pk_id_serial; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT pk_id_serial PRIMARY KEY (id_cliente);


--
-- TOC entry 1966 (class 2606 OID 24672)
-- Name: pk_id_status_cliente; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_cliente
    ADD CONSTRAINT pk_id_status_cliente PRIMARY KEY (id_status_cliente);


--
-- TOC entry 1962 (class 2606 OID 24637)
-- Name: pk_id_usuarios; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT pk_id_usuarios PRIMARY KEY (id_usuario);


--
-- TOC entry 1964 (class 2606 OID 24651)
-- Name: pk_tipo_gestion; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipogestion
    ADD CONSTRAINT pk_tipo_gestion PRIMARY KEY (id_tipo_gestion);


--
-- TOC entry 1969 (class 2606 OID 24673)
-- Name: fk_id_status_cliente; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT fk_id_status_cliente FOREIGN KEY (id_status) REFERENCES status_cliente(id_status_cliente);


--
-- TOC entry 1970 (class 2606 OID 24689)
-- Name: fk_id_tipo_gestion; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gestionllamadas
    ADD CONSTRAINT fk_id_tipo_gestion FOREIGN KEY (id_tipo_gestion) REFERENCES tipogestion(id_tipo_gestion);


--
-- TOC entry 1971 (class 2606 OID 24705)
-- Name: fk_id_tipo_gestion; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gestioncorreos
    ADD CONSTRAINT fk_id_tipo_gestion FOREIGN KEY (id_tipo_gestion) REFERENCES tipogestion(id_tipo_gestion);


--
-- TOC entry 2106 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-04-17 11:23:26

--
-- PostgreSQL database dump complete
--


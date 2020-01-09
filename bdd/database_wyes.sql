
DROP TABLE IF EXISTS PATIENT, PRODUCT, COMPONENT, TEST, STATUS, USER, NAME_COMP;

set names utf8;


CREATE TABLE PATIENT (
  id_patient SERIAL,
  name VARCHAR(128),
  e_mail VARCHAR(128),
  address VARCHAR(128),
  actions_history TEXT,
  review TEXT,
  PRIMARY KEY (id_patient)
);

CREATE TABLE PRODUCT (
  id_prod SERIAL,
  serial_number VARCHAR (64),
  serial_number_fabrication VARCHAR (64),
  name VARCHAR (64),
  status VARCHAR (64),
  fabrication_date DATE,
  hardware_version VARCHAR (64),
  package_version VARCHAR (64),
  software_version VARCHAR (64),
  problems_history TEXT,
  actions_history TEXT,
  test_results TEXT,
  PRIMARY KEY (id_prod)
);

CREATE TABLE COMPONENT (
  id_comp SERIAL,
  serial_number_comp VARCHAR (64),
  name_comp VARCHAR(64),
  quantity INT,
  PRIMARY KEY (id_comp)
);

CREATE TABLE TEST (
  test_results TEXT,
  test_date DATE
);

CREATE TABLE STATUS (
  status VARCHAR (128) NOT NULL,
  PRIMARY KEY (status)
);

CREATE TABLE USER (
  id_user SERIAL,
  name VARCHAR (64),
  address VARCHAR (128),
  e_mail VARCHAR (128),
  user_status VARCHAR (128),
  password VARCHAR (128),
  login VARCHAR (64),
  history_user TEXT DEFAULT NULL,
  PRIMARY KEY (id_user)
);

CREATE TABLE NAME_COMP (
  name_comp VARCHAR (128) NOT NULL,
  PRIMARY KEY (name_comp)
);


INSERT INTO NAME_COMP VALUES('Verre');
INSERT INTO NAME_COMP VALUES('Monture');
INSERT INTO NAME_COMP VALUES('Puce');
INSERT INTO NAME_COMP VALUES('Capteur');


INSERT INTO status VALUES('monté');
INSERT INTO status VALUES('testé');
INSERT INTO status VALUES('distribué');
INSERT INTO status VALUES('retiré');
INSERT INTO status VALUES('reconditionné');



ALTER TABLE PRODUCT ADD FOREIGN KEY (status) REFERENCES STATUS(status);
ALTER TABLE COMPONENT ADD FOREIGN KEY (name_comp) REFERENCES NAME_COMP(name_comp);

INSERT INTO PRODUCT VALUES(NULL,'serie_1','fabrication_1','test_lunette_1','monté','2020-07-01','meca_1','elec_1','logiciel_1','np','na','no_test');

set names cp850;

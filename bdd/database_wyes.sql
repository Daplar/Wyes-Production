USE wyes_prod;
DROP TABLE IF EXISTS PATIENT, PRODUCT, COMPONENT, TEST, STATUS, USER, NAME_COMP;

set names utf8;


CREATE TABLE PATIENT (
  id_patient SERIAL,
  name VARCHAR(128),
  e_mail VARCHAR(128),
  address VARCHAR(128),
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
INSERT INTO PRODUCT VALUES(4,'serie_1','fabrication_1',' ','monté','2020-07-01','meca_1','elec_1','logiciel_1','np','na','no_test');


INSERT INTO PATIENT VALUES(NULL,'patient_1','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_2','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_3','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_4','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_5','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_6','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_7','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_8','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_9','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_10','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_11','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_12','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_13','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_14','mail_test','address_test','no review');
INSERT INTO PATIENT VALUES(NULL,'patient_15','mail_test','address_test','no review');

INSERT INTO USER VALUES(NULL,'user_1','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_2','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_3','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_4','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_5','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_6','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_7','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_8','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_9','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_10','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_11','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_12','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_13','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_14','address_test','e_mail_test','status','pass','login',NULL);
INSERT INTO USER VALUES(NULL,'user_15','address_test','e_mail_test','status','pass','login',NULL);


set names cp850;

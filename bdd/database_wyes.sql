
DROP TABLE IF EXISTS PATIENT, PRODUCT, COMPONENT, TEST, STATUS;


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
  name VARCHAR(64),
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

INSERT INTO status VALUES('monté');
INSERT INTO status VALUES('testé');
INSERT INTO status VALUES('distribué');
INSERT INTO status VALUES('retiré');
INSERT INTO status VALUES('reconditionné');



ALTER TABLE PRODUCT ADD FOREIGN KEY (status) REFERENCES STATUS(status);

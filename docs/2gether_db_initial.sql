DROP DATABASE IF EXISTS 2gether_db;
CREATE DATABASE 2gether_db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE 2gether_db;

CREATE TABLE roles (
id tinyint(1) not null auto_increment,
name varchar(20) not null,
display_name varchar(20) not null,
created_at timestamp,
updated_at timestamp,
primary key(id)
)engine=innodb;

INSERT INTO roles VALUES
(NULL, 'admin', 'Administrator', DEFAULT, DEFAULT),
(NULL, 'user', 'Normal User', DEFAULT, DEFAULT);


CREATE TABLE days (
id tinyint(2) not null auto_increment,
primary key(id)
)engine=innodb;

INSERT INTO days VALUES
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL),
(NULL);

CREATE TABLE months (
id tinyint(2) not null auto_increment,
month varchar(20) not null,
month_abr varchar(4) not null,
primary key(id)
)engine=innodb;

INSERT INTO months VALUES
(NULL, 'Ιανουάριος', 'Ιαν'),
(NULL, 'Φεβρουάριος', 'Φεβ'),
(NULL, 'Μάρτιος', 'Μαρ'),
(NULL, 'Απρίλιος', 'Απρ'),
(NULL, 'Μάιος', 'Μαϊ'),
(NULL, 'Ιούνιος', 'Ιουν'),
(NULL, 'Ιούλιος', 'Ιουλ'),
(NULL, 'Αύγουστος', 'Αυγ'),
(NULL, 'Σεπτέμβριος', 'Σεπ'),
(NULL, 'Οκτώβριος', 'Οκτ'),
(NULL, 'Νοέμβριος', 'Νοε'),
(NULL, 'Δεκέμβριιος', 'Δεκ');

CREATE TABLE years (
id tinyint(4) not null auto_increment,
year varchar(4) not null,
primary key(id)
)engine=innodb;

INSERT INTO years VALUES
(NULL, '2017'),
(NULL, '2016'),
(NULL, '2015'),
(NULL, '2014'),
(NULL, '2013'),
(NULL, '2012'),
(NULL, '2011'),
(NULL, '2010'),
(NULL, '2009'),
(NULL, '2008'),
(NULL, '2007'),
(NULL, '2006'),
(NULL, '2005'),
(NULL, '2004'),
(NULL, '2003'),
(NULL, '2002'),
(NULL, '2001'),
(NULL, '2000'),
(NULL, '1999'),
(NULL, '1998'),
(NULL, '1997'),
(NULL, '1996'),
(NULL, '1995'),
(NULL, '1994'),
(NULL, '1993'),
(NULL, '1992'),
(NULL, '1991'),
(NULL, '1990'),
(NULL, '1989'),
(NULL, '1988'),
(NULL, '1987'),
(NULL, '1986'),
(NULL, '1985'),
(NULL, '1984'),
(NULL, '1983'),
(NULL, '1982'),
(NULL, '1981'),
(NULL, '1980'),
(NULL, '1979'),
(NULL, '1978'),
(NULL, '1977'),
(NULL, '1976'),
(NULL, '1975'),
(NULL, '1974'),
(NULL, '1973'),
(NULL, '1972'),
(NULL, '1971'),
(NULL, '1970'),
(NULL, '1969'),
(NULL, '1968'),
(NULL, '1967'),
(NULL, '1966'),
(NULL, '1965'),
(NULL, '1964'),
(NULL, '1963'),
(NULL, '1962'),
(NULL, '1961'),
(NULL, '1960'),
(NULL, '1959'),
(NULL, '1958'),
(NULL, '1957'),
(NULL, '1956'),
(NULL, '1955'),
(NULL, '1954'),
(NULL, '1953'),
(NULL, '1952'),
(NULL, '1951'),
(NULL, '1950'),
(NULL, '1949'),
(NULL, '1948'),
(NULL, '1947'),
(NULL, '1946'),
(NULL, '1945'),
(NULL, '1944'),
(NULL, '1943'),
(NULL, '1942'),
(NULL, '1941'),
(NULL, '1940'),
(NULL, '1939'),
(NULL, '1938'),
(NULL, '1937'),
(NULL, '1936'),
(NULL, '1935'),
(NULL, '1934'),
(NULL, '1933'),
(NULL, '1932'),
(NULL, '1931'),
(NULL, '1930');


CREATE TABLE cities (
id int(11) not null auto_increment,
city varchar(100) not null,
primary key(id)
)engine=innodb;


CREATE TABLE countries (
id int(11) not null auto_increment,
country varchar(100) not null,
country_abr varchar(3) not null,
primary key(id)
)engine=innodb;

INSERT INTO countries (id, country, country_abr) VALUES
(NULL, 'Afghanistan', 'AFG'),
(NULL, 'Åland Islands', 'ALA'),
(NULL, 'Albania', 'ALB'),
(NULL, 'Algeria', 'DZA'),
(NULL, 'American Samoa', 'ASM'),
(NULL, 'Andorra', 'AND'),
(NULL, 'Angola', 'AGO'),
(NULL, 'Anguilla', 'AIA'),
(NULL, 'Antarctica', 'ATA'),
(NULL, 'Antigua and Barbuda', 'ATG'),
(NULL, 'Argentina', 'ARG'),
(NULL, 'Armenia', 'ARM'),
(NULL, 'Aruba', 'ABW'),
(NULL, 'Australia', 'AUS'),
(NULL, 'Austria', 'AUT'),
(NULL, 'Azerbaijan', 'AZE'),
(NULL, 'Bahamas', 'BHS'),
(NULL, 'Bahrain', 'BHR'),
(NULL, 'Bangladesh', 'BGD'),
(NULL, 'Barbados', 'BRB'),
(NULL, 'Belarus', 'BLR'),
(NULL, 'Belgium', 'BEL'),
(NULL, 'Belize', 'BLZ'),
(NULL, 'Benin', 'BEN'),
(NULL, 'Bermuda', 'BMU'),
(NULL, 'Bhutan', 'BTN'),
(NULL, 'Bolivia, Plurinational State of', 'BOL'),
(NULL, 'Bonaire, Sint Eustatius and Saba', 'BES'),
(NULL, 'Bosnia and Herzegovina', 'BIH'),
(NULL, 'Botswana', 'BWA'),
(NULL, 'Bouvet Island', 'BVT'),
(NULL, 'Brazil', 'BRA'),
(NULL, 'British Indian Ocean Territory', 'IOT'),
(NULL, 'Brunei Darussalam', 'BRN'),
(NULL, 'Bulgaria', 'BGR'),
(NULL, 'Burkina Faso', 'BFA'),
(NULL, 'Burundi', 'BDI'),
(NULL, 'Cambodia', 'KHM'),
(NULL, 'Cameroon', 'CMR'),
(NULL, 'Canada', 'CAN'),
(NULL, 'Cape Verde', 'CPV'),
(NULL, 'Cayman Islands', 'CYM'),
(NULL, 'Central African Republic', 'CAF'),
(NULL, 'Chad', 'TCD'),
(NULL, 'Chile', 'CHL'),
(NULL, 'China', 'CHN'),
(NULL, 'Christmas Island', 'CXR'),
(NULL, 'Cocos (Keeling) Islands', 'CCK'),
(NULL, 'Colombia', 'COL'),
(NULL, 'Comoros', 'COM'),
(NULL, 'Congo', 'COG'),
(NULL, 'Congo, the Democratic Republic of the', 'COD'),
(NULL, 'Cook Islands', 'COK'),
(NULL, 'Costa Rica', 'CRI'),
(NULL, 'Côte d’Ivoire', 'CIV'),
(NULL, 'Croatia', 'HRV'),
(NULL, 'Cuba', 'CUB'),
(NULL, 'Curaçao', 'CUW'),
(NULL, 'Cyprus', 'CYP'),
(NULL, 'Czech Republic', 'CZE'),
(NULL, 'Denmark', 'DNK'),
(NULL, 'Djibouti', 'DJI'),
(NULL, 'Domenica', 'DMA'),
(NULL, 'Dominican RepDominicaublic', 'DOM'),
(NULL, 'Ecuador', 'ECU'),
(NULL, 'Egypt', 'EGY'),
(NULL, 'El Salvador', 'SLV'),
(NULL, 'Equatorial Guinea', 'GNQ'),
(NULL, 'Eritrea', 'ERI'),
(NULL, 'Estonia', 'EST'),
(NULL, 'Ethiopia', 'ETH'),
(NULL, 'Falkland Islands (Malvinas)', 'FLK'),
(NULL, 'Faroe Islands', 'FRO'),
(NULL, 'Fiji', 'FJI'),
(NULL, 'Finland', 'FIN'),
(NULL, 'France', 'FRA'),
(NULL, 'French Guiana', 'GUF'),
(NULL, 'French Polynesia', 'PYF'),
(NULL, 'French Southern Territories', 'ATF'),
(NULL, 'Gabon', 'GAB'),
(NULL, 'Gambia', 'GMB'),
(NULL, 'Georgia', 'GEO'),
(NULL, 'Germany', 'DEU'),
(NULL, 'Ghana', 'GHA'),
(NULL, 'Gibraltar', 'GIB'),
(NULL, 'Greece', 'GRC'),
(NULL, 'Greenland', 'GRL'),
(NULL, 'Grenada', 'GRD'),
(NULL, 'Guadeloupe', 'GLP'),
(NULL, 'Guam', 'GUM'),
(NULL, 'Guatemala', 'GTM'),
(NULL, 'Guernsey', 'GGY'),
(NULL, 'Guinea', 'GIN'),
(NULL, 'Guinea-Bissau', 'GNB'),
(NULL, 'Guyana', 'GUY'),
(NULL, 'Haiti', 'HTI'),
(NULL, 'Heard Island and McDonald Islands', 'HMD'),
(NULL, 'Holy See (Vatican City State)', 'VAT'),
(NULL, 'Honduras', 'HND'),
(NULL, 'Hong Kong', 'HKG'),
(NULL, 'Hungary', 'HUN'),
(NULL, 'Iceland', 'ISL'),
(NULL, 'India', 'IND'),
(NULL, 'Indonesia', 'IDN'),
(NULL, 'Iran, Islamic Republic of', 'IRN'),
(NULL, 'Iraq', 'IRQ'),
(NULL, 'Ireland', 'IRL'),
(NULL, 'Isle of Man', 'IMN'),
(NULL, 'Israel', 'ISR'),
(NULL, 'Italy', 'ITA'),
(NULL, 'Jamaica', 'JAM'),
(NULL, 'Japan', 'JPN'),
(NULL, 'Jersey', 'JEY'),
(NULL, 'Jordan', 'JOR'),
(NULL, 'Kazakhstan', 'KAZ'),
(NULL, 'Kenya', 'KEN'),
(NULL, 'Kiribati', 'KIR'),
(NULL, 'Korea, Democratic People’s Republic of', 'PRK'),
(NULL, 'Korea, Republic of', 'KOR'),
(NULL, 'Kuwait', 'KWT'),
(NULL, 'Kyrgyzstan', 'KGZ'),
(NULL, 'Lao People’s Democratic Republic', 'LAO'),
(NULL, 'Latvia', 'LVA'),
(NULL, 'Lebanon', 'LBN'),
(NULL, 'Lesotho', 'LSO'),
(NULL, 'Liberia', 'LBR'),
(NULL, 'Libya', 'LBY'),
(NULL, 'Liechtenstein', 'LIE'),
(NULL, 'Lithuania', 'LTU'),
(NULL, 'Luxembourg', 'LUX'),
(NULL, 'Macao', 'MAC'),
(NULL, 'Macedonia, the former Yugoslav Republic of', 'MKD'),
(NULL, 'Madagascar', 'MDG'),
(NULL, 'Malawi', 'MWI'),
(NULL, 'Malaysia', 'MYS'),
(NULL, 'Maldives', 'MDV'),
(NULL, 'Mali', 'MLI'),
(NULL, 'Malta', 'MLT'),
(NULL, 'Marshall Islands', 'MHL'),
(NULL, 'Martinique', 'MTQ'),
(NULL, 'Mauritania', 'MRT'),
(NULL, 'Mauritius', 'MUS'),
(NULL, 'Mayotte', 'MYT'),
(NULL, 'Mexico', 'MEX'),
(NULL, 'Micronesia, Federated States of', 'FSM'),
(NULL, 'Moldova, Republic of', 'MDA'),
(NULL, 'Monaco', 'MCO'),
(NULL, 'Mongolia', 'MNG'),
(NULL, 'Montenegro', 'MNE'),
(NULL, 'Montserrat', 'MSR'),
(NULL, 'Morocco', 'MAR'),
(NULL, 'Mozambique', 'MOZ'),
(NULL, 'Myanmar', 'MMR'),
(NULL, 'Namibia', 'NAM'),
(NULL, 'Nauru', 'NRU'),
(NULL, 'Nepal', 'NPL'),
(NULL, 'Netherlands', 'NLD'),
(NULL, 'New Caledonia', 'NCL'),
(NULL, 'New Zealand', 'NZL'),
(NULL, 'Nicaragua', 'NIC'),
(NULL, 'Niger', 'NER'),
(NULL, 'Nigeria', 'NGA'),
(NULL, 'Niue', 'NIU'),
(NULL, 'Norfolk Island', 'NFK'),
(NULL, 'Northern Mariana Islands', 'MNP'),
(NULL, 'Norway', 'NOR'),
(NULL, 'Oman', 'OMN'),
(NULL, 'Pakistan', 'PAK'),
(NULL, 'Palau', 'PLW'),
(NULL, 'Palestinian Territory, Occupied', 'PSE'),
(NULL, 'Panama', 'PAN'),
(NULL, 'Papua New Guinea', 'PNG'),
(NULL, 'Paraguay', 'PRY'),
(NULL, 'Peru', 'PER'),
(NULL, 'Philippines', 'PHL'),
(NULL, 'Pitcairn', 'PCN'),
(NULL, 'Poland', 'POL'),
(NULL, 'Portugal', 'PRT'),
(NULL, 'Puerto Rico', 'PRI'),
(NULL, 'Qatar', 'QAT'),
(NULL, 'Réunion', 'REU'),
(NULL, 'Romania', 'ROU'),
(NULL, 'Russian Federation', 'RUS'),
(NULL, 'Rwanda', 'RWA'),
(NULL, 'Saint Barthélemy', 'BLM'),
(NULL, 'Saint Helena, Ascension and Tristan da Cunha', 'SHN'),
(NULL, 'Saint Kitts and Nevis', 'KNA'),
(NULL, 'Saint Lucia', 'LCA'),
(NULL, 'Saint Martin (French part)', 'MAF'),
(NULL, 'Saint Pierre and Miquelon', 'SPM'),
(NULL, 'Saint Vincent and the Grenadines', 'VCT'),
(NULL, 'Samoa', 'WSM'),
(NULL, 'San Marino', 'SMR'),
(NULL, 'Sao Tome and Principe', 'STP'),
(NULL, 'Saudi Arabia', 'SAU'),
(NULL, 'Senegal', 'SEN'),
(NULL, 'Serbia', 'SRB'),
(NULL, 'Seychelles', 'SYC'),
(NULL, 'Sierra Leone', 'SLE'),
(NULL, 'Singapore', 'SGP'),
(NULL, 'Sint Maarten (Dutch part)', 'SXM'),
(NULL, 'Slovakia', 'SVK'),
(NULL, 'Slovenia', 'SVN'),
(NULL, 'Solomon Islands', 'SLB'),
(NULL, 'Somalia', 'SOM'),
(NULL, 'South Africa', 'ZAF'),
(NULL, 'South Georgia and the South Sandwich Islands', 'SGS'),
(NULL, 'South Sudan', 'SSD'),
(NULL, 'Spain', 'ESP'),
(NULL, 'Sri Lanka', 'LKA'),
(NULL, 'Sudan', 'SDN'),
(NULL, 'Suriname', 'SUR'),
(NULL, 'Svalbard and Jan Mayen', 'SJM'),
(NULL, 'Swaziland', 'SWZ'),
(NULL, 'Sweden', 'SWE'),
(NULL, 'Switzerland', 'CHE'),
(NULL, 'Syrian Arab Republic', 'SYR'),
(NULL, 'Taiwan, Province of China', 'TWN'),
(NULL, 'Tajikistan', 'TJK'),
(NULL, 'Tanzania, United Republic of', 'TZA'),
(NULL, 'Thailand', 'THA'),
(NULL, 'Timor-Leste', 'TLS'),
(NULL, 'Togo', 'TGO'),
(NULL, 'Tokelau', 'TKL'),
(NULL, 'Tonga', 'TON'),
(NULL, 'Trinidad and Tobago', 'TTO'),
(NULL, 'Tunisia', 'TUN'),
(NULL, 'Turkey', 'TUR'),
(NULL, 'Turkmenistan', 'TKM'),
(NULL, 'Turks and Caicos Islands', 'TCA'),
(NULL, 'Tuvalu', 'TUV'),
(NULL, 'Uganda', 'UGA'),
(NULL, 'Ukraine', 'UKR'),
(NULL, 'United Arab Emirates', 'ARE'),
(NULL, 'United Kingdom', 'GBR'),
(NULL, 'United States', 'USA'),
(NULL, 'United States Minor Outlying Islands', 'UMI'),
(NULL, 'Uruguay', 'URY'),
(NULL, 'Uzbekistan', 'UZB'),
(NULL, 'Vanuatu', 'VUT'),
(NULL, 'Venezuela, Bolivarian Republic of', 'VEN'),
(NULL, 'Viet Nam', 'VNM'),
(NULL, 'Virgin Islands, British', 'VGB'),
(NULL, 'Virgin Islands, U.S.', 'VIR'),
(NULL, 'Wallis and Futuna', 'WLF'),
(NULL, 'Western Sahara', 'ESH'),
(NULL, 'Yemen', 'YEM'),
(NULL, 'Zambia', 'ZMB'),
(NULL, 'Zimbabwe', 'ZWE');


DROP TABLE IF EXISTS users;
CREATE TABLE users (
id int not null auto_increment,
role_id tinyint(1) not null DEFAULT 2,
last_name varchar(70) not null,
first_name varchar(70) not null,
email varchar(50) not null,
password varchar(40) not null,
day_id tinyint(2) not null,
month_id tinyint(2) not null,
year_id tinyint(4) not null,
sex tinyint(1) not null,
city_id int(11) not null,
country_id int(11) not null,
avatar varchar(255) not null,
created_at timestamp,
updated_at timestamp not null,
token varchar(20),
primary key(id),
foreign key(role_id) references roles(id) on update cascade on delete cascade,
foreign key(day_id) references days(id) on update cascade on delete cascade,
foreign key(month_id) references months(id) on update cascade on delete cascade,
foreign key(year_id) references years(id) on update cascade on delete cascade,
foreign key(city_id) references cities(id) on update cascade on delete cascade,
foreign key(country_id) references countries(id) on update cascade on delete cascade
)engine=innodb;


DROP TABLE IF EXISTS friend_requests;
CREATE TABLE friend_requests (
  id INT NOT NULL AUTO_INCREMENT,
  req_from INT NOT NULL,
  req_to INT NOT NULL,
  req_date TIMESTAMP NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(req_from) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(req_to) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS relationship;
CREATE TABLE relationship (
  user1_id INT NOT NULL,
  user2_id INT NOT NULL,
  status tinyint(1) NOT NULL, --0: pending / 1: accepted / 2: blocked
  action_id INT NOT NULL,
  rel_date TIMESTAMP NOT NULL,
  PRIMARY KEY(user1_id, user2_id, rel_date),
  FOREIGN KEY(user1_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(user2_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(action_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;


DROP TABLE IF EXISTS albumcat;
CREATE TABLE albumcat (
  id INT NOT NULL AUTO_INCREMENT,
  category VARCHAR(50),
  PRIMARY KEY(id)
)ENGINE=innodb;

INSERT INTO albumcat (id, category) VALUES
(NULL, 'Cover Photos'),
(NULL, 'Profile Pictures'),
(NULL, 'Timeline Pictures'),
(NULL, 'Shared Photos'),
(NULL, 'Uploaded Photos'),
(NULL, 'Videos');

DROP TABLE IF EXISTS albums;
CREATE TABLE albums (
  id INT NOT NULL AUTO_INCREMENT,
  album_title VARCHAR(50),
  album_desc TEXT,
  album_city INT(11),
  album_country INT(11),
  created_by INT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  album_thumb VARCHAR (200) NOT NULL,
  album_path VARCHAR(100) NOT NULL,
  album_cat INT NOT NULL,
  album_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  PRIMARY KEY(id, created_by, created_at),
  FOREIGN KEY(created_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(album_cat) REFERENCES albumcat(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(album_city) REFERENCES cities(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(album_country) REFERENCES countries(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

INSERT INTO albums (id, album_title, album_desc, album_city, album_country, created_by, created_at, album_thumb, album_path, album_cat, album_privacy) VALUES
(NULL, 'Profile Pictures', NULL, 2, 86, 3, now(), 'users/profiles/thumbs/fotini_timotheou.jpg', '../users/profiles/', 2, 0),
(NULL, 'Profile Pictures', NULL, 1, 86, 5, now(), 'users/profiles/thumbs/elias_dapoulakis.jpg', '../users/profiles/', 2, 0),
(NULL, 'Profile Pictures', NULL, 1, 86, 13, now(), 'users/profiles/thumbs/katerina_chalkou.jpg', '../users/profiles/', 2, 0),
(NULL, 'Profile Pictures', NULL, 1, 86, 14, now(), 'users/profiles/thumbs/eleni_koumoura.jpg', '../users/profiles/', 2, 0),
(NULL, 'Profile Pictures', NULL, 1, 86, 15, now(), 'users/profiles/thumbs/dimitris_fragioglou.jpg', '../users/profiles/', 2, 0);
-- 0=photo album, 1=video album --

DROP TABLE IF EXISTS photos;
CREATE TABLE photos (
  id INT NOT NULL AUTO_INCREMENT,
  img_thumb VARCHAR(200),
  img_src VARCHAR(200),
  img_title VARCHAR(50),
  img_desc TEXT,
  uploaded_by INT NOT NULL,
  uploaded_at TIMESTAMP NOT NULL,
  img_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  album_id INT NOT NULL,
  PRIMARY KEY(id, uploaded_by, uploaded_at),
  FOREIGN KEY(uploaded_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(album_id) REFERENCES albums(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES
(NULL, 'users/profiles/thumbs/fotini_timotheou.jpg', 'users/profiles/fotini_timotheou.jpg', NULL, NULL, 3, now(), 0, 29),
(NULL, 'users/profiles/thumbs/elias_dapoulakis.jpg', 'users/profiles/elias_dapoulakis.jpg', NULL, NULL, 5, now(), 0, 30),
(NULL, 'users/profiles/thumbs/katerina_chalkou.jpg', 'users/profiles/katerina_chalkou.jpg', NULL, NULL, 13, now(), 0, 31),
(NULL, 'users/profiles/thumbs/eleni_koumoura.jpg', 'users/profiles/eleni_koumoura.jpg', NULL, NULL, 14, now(), 0, 32),
(NULL, 'users/profiles/thumbs/dimitris_fragioglou.jpg', 'users/profiles/dimitris_fragioglou.jpg', NULL, NULL, 15, now(), 0, 33);


-- 0=profile picture, 1=cover image, 2=separate --

DROP TABLE IF EXISTS videos;
CREATE TABLE videos (
  id INT NOT NULL AUTO_INCREMENT,
  video_src VARCHAR(200) NOT NULL,
  video_path VARCHAR(100) NOT NULL,
  video_title VARCHAR(50) NOT NULL,
  video_desc TEXT NOT NULL,
  video_city INT(11),
  video_country INT(11),
  uploaded_by INT NOT NULL,
  uploaded_at TIMESTAMP NOT NULL,
  video_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  album_id INT NOT NULL,
  PRIMARY KEY(id, uploaded_by, uploaded_at),
  FOREIGN KEY(uploaded_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(video_city) REFERENCES cities(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(video_country) REFERENCES countries(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;


DROP TABLE IF EXISTS studies;
CREATE TABLE studies (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  study_desc VARCHAR(255) NOT NULL,
  study_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(id, user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS professions;
CREATE TABLE professions (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  profession_desc VARCHAR(255) NOT NULL,
  profession_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(id, user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS phones;
CREATE TABLE phones (
  user_id INT NOT NULL,
  phone_number VARCHAR(15) NOT NULL,
  phone_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, phone_number, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS websites;
CREATE TABLE websites (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  website_link VARCHAR(50) NOT NULL,
  website_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(id, user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS mailprivacy;
CREATE TABLE mailprivacy (
  user_id INT NOT NULL,
  email_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS birthplace;
CREATE TABLE birthplace (
  user_id INT NOT NULL,
  birthplace_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS bcity;
CREATE TABLE bcity (
  user_id INT NOT NULL,
  city_id INT(11) NULL,
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, city_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(city_id) REFERENCES cities(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS bcountry;
CREATE TABLE bcountry (
  user_id INT NOT NULL,
  country_id INT(11) NULL,
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, country_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(country_id) REFERENCES countries(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS homeplace;
CREATE TABLE homeplace (
  user_id INT NOT NULL,
  homeplace_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS bdaymonthprivacy;
CREATE TABLE bdaymonthprivacy (
  user_id INT NOT NULL,
  bdaymonth_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;


DROP TABLE IF EXISTS byearprivacy;
CREATE TABLE byearprivacy (
  user_id INT NOT NULL,
  byear_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS sexprivacy;
CREATE TABLE sexprivacy (
  user_id INT NOT NULL,
  sex_privacy TINYINT(1) NOT NULL, -- 0:public / 1:friends / 2:only me --
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY(user_id, updated_at),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
  id INT NOT NULL AUTO_INCREMENT,
  message text NOT NULL,
  sent_at TIMESTAMP NOT NULL,
  msg_from INT NOT NULL,
  msg_to INT NOT NULL,
  opened INT(1) NOT NULL,
  opened_at TIMESTAMP NOT NULL,
  recipient_del INT(1) NOT NULL,
  sender_del INT(1) NOT NULL,
  PRIMARY KEY(id, sent_at),
  FOREIGN KEY(msg_from) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(msg_to) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS sessions;
CREATE TABLE sessions (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  login_time TIMESTAMP NOT NULL,
  online INT(1) NOT NULL,
  PRIMARY KEY(id, user_id, login_time),
  FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;



DROP TABLE IF EXISTS postcat;
CREATE TABLE postcat (
  id INT NOT NULL AUTO_INCREMENT,
  category VARCHAR(50),
  PRIMARY KEY(id)
)ENGINE=innodb;

INSERT INTO postcat (id, category) VALUES
(NULL, 'text'),
(NULL, 'photo'),
(NULL, 'video'),
(NULL, 'youtube'),
(NULL, 'vimeo'),
(NULL, 'link');

DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
  id INT NOT NULL AUTO_INCREMENT,
  body text NOT NULL,
  added_at TIMESTAMP NOT NULL,
  added_by INT NOT NULL,
  posted_to INT NOT NULL,
  post_city INT(11),
  post_country INT(11),
  post_cat INT NOT NULL,
  post_privacy TINYINT(1) NOT NULL,
  post_hide INT(1) NOT NULL,
  post_status INT(1) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(added_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(posted_to) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(post_cat) REFERENCES postcat(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(post_city) REFERENCES users(city_id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(post_country) REFERENCES users(country_id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS photoposts;
CREATE TABLE photoposts (
  id INT NOT NULL AUTO_INCREMENT,
  photopost_title VARCHAR(50),
  photopost_thumb VARCHAR(200) NOT NULL,
  photopost_src VARCHAR(200) NOT NULL,
  photopost_path VARCHAR(100) NOT NULL,
  post_id INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS videoposts;
CREATE TABLE videoposts (
  id INT NOT NULL AUTO_INCREMENT,
  videopost_title VARCHAR(50),
  videopost_src VARCHAR(200) NOT NULL,
  videopost_path VARCHAR(100) NOT NULL,
  post_id INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS linkposts;
CREATE TABLE linkposts (
  id INT NOT NULL AUTO_INCREMENT,
  linkpost_src VARCHAR(200) NOT NULL,
  post_id INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS comments_posts;
CREATE TABLE comments_posts (
  id INT NOT NULL AUTO_INCREMENT,
  comment VARCHAR(255) NOT NULL,
  com_at TIMESTAMP NOT NULL,
  com_by INT NOT NULL,
  post_id INT NOT NULL,
  com_status INT(1) NOT NULL,
  PRIMARY KEY(id, post_id),
  FOREIGN KEY(com_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;


DROP TABLE IF EXISTS comments_photos;
CREATE TABLE comments_photos (
  id INT NOT NULL AUTO_INCREMENT,
  photo_comment VARCHAR(255) NOT NULL,
  photocom_at TIMESTAMP NOT NULL,
  photocom_by INT NOT NULL,
  photo_id INT NOT NULL,
  com_status INT(1) NOT NULL,
  PRIMARY KEY(id, photo_id),
  FOREIGN KEY(photocom_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(photo_id) REFERENCES photos(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS comments_videos;
CREATE TABLE comments_videos (
  id INT NOT NULL AUTO_INCREMENT,
  video_comment VARCHAR(255) NOT NULL,
  videocom_at TIMESTAMP NOT NULL,
  videocom_by INT NOT NULL,
  video_id INT NOT NULL,
  com_status INT(1) NOT NULL,
  PRIMARY KEY(id, video_id),
  FOREIGN KEY(videocom_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(video_id) REFERENCES videos(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;


DROP TABLE IF EXISTS likes_posts;
CREATE TABLE likes_posts (
  id INT NOT NULL AUTO_INCREMENT,
  liked_by INT NOT NULL,
  post_id INT NOT NULL,
  like_status INT(1) NOT NULL,
  PRIMARY KEY(id, liked_by, post_id),
  FOREIGN KEY(liked_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS likes_photos;
CREATE TABLE likes_photos (
  id INT NOT NULL AUTO_INCREMENT,
  liked_by INT NOT NULL,
  photo_id INT NOT NULL,
  like_status INT(1) NOT NULL,
  PRIMARY KEY(id, liked_by, photo_id),
  FOREIGN KEY(liked_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(photo_id) REFERENCES photos(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS likes_videos;
CREATE TABLE likes_videos (
  id INT NOT NULL AUTO_INCREMENT,
  liked_by INT NOT NULL,
  video_id INT NOT NULL,
  like_status INT(1) NOT NULL,
  PRIMARY KEY(id, liked_by, video_id),
  FOREIGN KEY(liked_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(video_id) REFERENCES videos(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS likes_com_posts;
CREATE TABLE likes_com_posts (
  id INT NOT NULL AUTO_INCREMENT,
  liked_by INT NOT NULL,
  comment_id INT NOT NULL,
  like_status INT(1) NOT NULL,
  PRIMARY KEY(id, liked_by, comment_id),
  FOREIGN KEY(liked_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(comment_id) REFERENCES comments_posts(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS likes_com_photos;
CREATE TABLE likes_com_photos (
  id INT NOT NULL AUTO_INCREMENT,
  liked_by INT NOT NULL,
  comment_id INT NOT NULL,
  like_status INT(1) NOT NULL,
  PRIMARY KEY(id, liked_by, comment_id),
  FOREIGN KEY(liked_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(comment_id) REFERENCES comments_photos(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;

DROP TABLE IF EXISTS likes_com_videos;
CREATE TABLE likes_com_videos (
  id INT NOT NULL AUTO_INCREMENT,
  liked_by INT NOT NULL,
  comment_id INT NOT NULL,
  like_status INT(1) NOT NULL,
  PRIMARY KEY(id, liked_by, comment_id),
  FOREIGN KEY(liked_by) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(comment_id) REFERENCES comments_videos(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innodb;
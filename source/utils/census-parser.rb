require 'nokogiri'
require 'open-uri'

doc = Nokogiri::XML(open("http://www.ine.gub.uy/censos2011/totalesdepartamentos/localidades.xml"))

departamentos = {
  1 => "artigas",
  2 => "canelones",
  3 => "cerrolargo",
  4 => "colonia",
  5 => "durazno",
  6 => "flores",
  7 => "florida",
  8 => "lavalleja",
  9 => "maldonado" ,
  10 => "montevideo",
  11 => "paysandu",
  12 => "rionegro",
  13 => "rivera",
  14 => "rocha",
  15 => "salto",
  16 => "sanjose",
  17 => "soriano",
  18 => "tacuarembo",
  19 => "treintaytres"
}
  
sql_create_query = "CREATE TABLE IF NOT EXISTS `monita`.`ma_census` (
  `id` BIGINT  NOT NULL AUTO_INCREMENT,
  `depto_id` INTEGER  NOT NULL,
  `nombre` VARCHAR(50)  NOT NULL,
  `tlocales` BIGINT  NOT NULL DEFAULT 0,
  `tviviendas` BIGINT  NOT NULL DEFAULT 0,
  `viviendasdesocupadas` BIGINT  NOT NULL DEFAULT 0,
  `viviendasocupadas` BIGINT  NOT NULL DEFAULT 0,
  `hogares` BIGINT  NOT NULL DEFAULT 0,
  `hombres` BIGINT  NOT NULL DEFAULT 0,
  `mujeres` BIGINT  DEFAULT 0,
  `tpersonas` BIGINT  NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
CONSTRAINT `census_to_department_fk` FOREIGN KEY `census_to_department_fk` (`depto_id`)
REFERENCES `ma_departments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = InnoDB
COMMENT = \'Census data\';"
puts sql_create_query

sql_insert_query = "INSERT INTO ma_census(depto_id, nombre, tlocales, tviviendas, viviendasdesocupadas, viviendasocupadas, hogares, hombres, mujeres, tpersonas) VALUES"
departamentos.each do |depto|
  doc.xpath("//" + depto[1]).each do |p|
    sql_insert_query += "(#{depto[0]},'#{p.search("nombre").text}', #{p.search("Tlocales").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("Tviviendas").text.gsub('.','')}, #{p.search("viviendasdesocupadas").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("viviendasocupadas").text.gsub('.','')}, #{p.search("hogares").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("hombres").text.gsub('.','')}, #{p.search("mujeres").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("Tpersonas").text.gsub('.','')}),\n"
  end
end

sql_insert_query += ";"
puts sql_insert_query;

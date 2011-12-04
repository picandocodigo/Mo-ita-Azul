require 'nokogiri'
require 'open-uri'

doc = Nokogiri::XML(open("http://www.ine.gub.uy/censos2011/totalesdepartamentos/localidades.xml"))

departamentos = [
  "artigas", "canelones", "cerrolargo", "colonia", "durazno", 
  "flores", "florida", "lavalleja", "maldonado" , "montevideo",
  "paysandu", "rionegro", "rivera","rocha", "salto", "sanjose",
  "soriano", "tacuarembo", "treintaytres"
  ]
  
sql_create_query = 'CREATE TABLE IF NOT EXISTS `monita`.`ma_census` (
  `id` BIGINT  NOT NULL AUTO_INCREMENT,
  `depto` VARCHAR  NOT NULL,
  `nombre` VARCHAR  NOT NULL,
  `tlocales` BIGINT  NOT NULL DEFAULT 0,
  `tviviendas` BIGINT  NOT NULL DEFAULT 0,
  `viviendasdesocupadas` BIGINT  NOT NULL DEFAULT 0,
  `viviendasocupadas` BIGINT  NOT NULL DEFAULT 0,
  `hogares` BIGINT  NOT NULL DEFAULT 0,
  `hombres` BIGINT  NOT NULL DEFAULT 0,
  `mujeres` BIGINT  DEFAULT 0,
  `tpersonas` BIGINT  NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
COMMENT = \'Census data\';'

departamentos.each do |depto|
  doc.xpath("//" + depto).each do |p|
    sql_insert_query = "INSERT INTO ma_census VALUES("
    sql_insert_query += "'#{depto}','#{p.search("nombre").text}', #{p.search("Tlocales").text},"
    sql_insert_query += "#{p.search("Tviviendas").text}, #{p.search("viviendasdesocupadas").text},"
    sql_insert_query += "#{p.search("viviendasocupadas").text}, #{p.search("hogares").text},"
    sql_insert_query += "#{p.search("hombres").text}, #{p.search("mujeres").text},"
    sql_insert_query += "#{p.search("Tpersonas").text}"
    puts sql_insert_query;
  end
end
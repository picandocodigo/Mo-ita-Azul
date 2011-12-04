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
  `depto` VARCHAR(50)  NOT NULL,
  `nombre` VARCHAR(50)  NOT NULL,
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
ENGINE = InnoDB
COMMENT = \'Census data\';'

sql_insert_query = "INSERT INTO ma_census(depto, nombre, tlocales, tviviendas, viviendasdesocupadas, viviendasocupadas, hogares, hombres, mujeres, tpersonas) VALUES"
departamentos.each do |depto|
  doc.xpath("//" + depto).each do |p|
    sql_insert_query += "('#{depto}','#{p.search("nombre").text}', #{p.search("Tlocales").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("Tviviendas").text.gsub('.','')}, #{p.search("viviendasdesocupadas").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("viviendasocupadas").text.gsub('.','')}, #{p.search("hogares").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("hombres").text.gsub('.','')}, #{p.search("mujeres").text.gsub('.','')}, "
    sql_insert_query += "#{p.search("Tpersonas").text.gsub('.','')}),\n"

  end
end

sql_insert_query += ";"
    puts sql_insert_query;

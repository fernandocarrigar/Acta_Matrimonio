CREATE VIEW view_lts_archivo AS
SELECT arc.id_archivos AS Id_Archivo, arc.archivo AS PDF, arc.nom_archivos AS NombreArchivo, par.id_pareja AS Acta, par.fecha_par AS FechaRegistro, reg.sit_mat AS TipoRegimen, 
per1.nombre_per AS N1, per1.ap_paterno_per AS ApellidoPaternoN1, per1.ap_materno_per AS ApellidoMaternoN1, 
per1.edad_per AS EdadN1, per1.domicilio_per AS DomicilioN1, per1.ocupacion_per AS OcupacionN1, per1.lug_nac_per AS LugarNacimientoN1, 
nac1.nacionalidad AS NacionalidadN1, pd1.nombre_pad AS NombrePadreN1, pd1.nombre_mad AS NombreMadreN1, 
pd1.domicilio_pad AS DomicilioPadresN1, pd1.ocupacion_pad AS OcupacionPadreN1, pd1.ocupacion_mad AS OcupacionMadreN1, 
per2.nombre_per AS N2, per2.ap_paterno_per AS ApellidoPaternoN2, per2.ap_materno_per AS ApellidoMaternoN2, 
per2.edad_per AS EdadN2, per2.domicilio_per AS DomicilioN2, per2.ocupacion_per AS OcupacionN2, per2.lug_nac_per AS LugarNacimientoN2, 
nac2.nacionalidad AS NacionalidadN2, pd2.nombre_pad AS NombrePadreN2, pd2.nombre_mad AS NombreMadreN2, 
pd2.domicilio_pad AS DomicilioPadresN2, pd2.ocupacion_pad AS OcupacionPadreN2, pd2.ocupacion_mad AS OcupacionMadreN2,
dtslgs.dts_entidad AS Entidad, dtslgs.dts_delegacion AS Delegacion, dtslgs.dts_juzgado AS Juzgado,
dtslgs.dts_libro AS Libro, dtslgs.dts_year AS Anual, dtslgs.dts_clase AS Clase
FROM archivos AS arc 
LEFT JOIN
parejas AS par
ON arc.id_pareja = par.id_pareja
LEFT JOIN
situacion_mat AS reg
ON par.id_sit_mat = reg.id_sit_mat
LEFT JOIN
persona AS per1
ON par.id_per_mas = per1.id_per
LEFT JOIN
nacionalidad AS nac1
ON per1.id_nac = nac1.id_nac
LEFT JOIN
padres AS pd1
ON per1.id_padres = pd1.id_padres
LEFT JOIN
persona AS per2
ON par.id_per_fem = per2.id_per
LEFT JOIN
nacionalidad AS nac2
ON per2.id_nac = nac2.id_nac
LEFT JOIN
padres AS pd2
ON per2.id_padres = pd2.id_padres
LEFT JOIN
dts_legales AS dtslgs
ON par.id_dts_lgs = dtslgs.id_dts_lgs
ORDER BY id_archivos DESC
;
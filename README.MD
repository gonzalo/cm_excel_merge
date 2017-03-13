# Catedra Miró Excel Merge
Script para la fusión de las fichas elaboradas por el Taller Digital en
un único documento excel/csv

Hemos empezado explorando todas las subcarpetas del directorio "Digitalizacion
Taller de Imagen - Monografias" y copiando los excel en un único directorio
  ```find . -name *.xlsx -exec cp "{}" fichas/ \;```

Los documentos tienen este formato

| | A | B |
|---|---|---|
| 5 | NÚMERO | 1965/001 |
| 6 | TITOL | PINTURES D´ANTONI MIRÓ |
| 7 | AUTOR PLÀCTIC | ANTONI MIRÓ |
| 8 | AUTOR TEXT |  |
| 9 | ILUSTRACIÓ | COLOR |
| 10 | DESCRIPCIÓ | CARTULINA |
| 11 | PUBLICACIÓ | ALCOIART |
| 12 | PORTADA |  |
| 13 | DATA | 1965 |
| 14 | TIPUS |  |
| 15 | FORMAT | 21,5 x 16,5 cm |
| 16 | Nº DE PÀGINES	 | 1 |
| 17 | IDENTIFICACIÓ	 | ART |
| 18 | FONT	 | CASA REGIONAL MURCIA-ALBACETE, VALENCIA |
| 19 | LLENGUA	 | CATALÀ |
| 20 | DIGITALITZACIÓ	 | S/CAT, 1 EJEMPLAR |

Nos interesa fusionar los documentos en un único excel/csv con este aspecto

| Nombre archivo | NÚMERO | TITULO | AUTOR PLÁSTICO | AUTOR TEXTO | ILUSTRACIÓN | ... |
|-|-|-|-|-|-|-|
|1965_001 PINTURES D´ANTONI MIRÓ.xlsx | 1965/001 | PINTURES D´ANTONI MIRÓ | ANTONI MIRÓ |  |COLOR | ... |
  |1965_001 PINTURES D´ANTONI MIRÓ.xlsx | 1965/001 | PINTURES D´ANTONI MIRÓ | ANTONI MIRÓ |  |COLOR | ... |

## Procedimiento
1. Abrir cada uno de los archivo excel del directorio
1. Leer el rango B5-B20
1. Convertirlo en un array
1. Añadir el nombre del archivo al principio del array
1. Guardar el registro en una excel/CSV final

## Requisitos
- PHP
- Extensiones PHP-zip

## Funcionamiento
Una vez ubicados todos los archivos .xlsx en rawfiles/ ejecutar
```php cm_excel_merge.php```. La salida será guardada en ```output.xlsx```

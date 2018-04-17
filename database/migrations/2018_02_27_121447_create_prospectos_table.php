<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateProspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Prospectos", 'prospectos', 'nombrecompletoprosp', 'fa-user', [
            ["fecha", "Fecha", "Date", false, "", 0, 0, false],
            ["nombrecompletoprosp", "Nombre Completo", "Name", false, "", 0, 256, false],
            ["telefono", "Teléfono", "Mobile", false, "", 0, 20, false],
            ["celular", "Celular", "Mobile", false, "", 0, 20, false],
            ["email", "Mail", "Email", false, "", 0, 256, false],
            ["estadocivil", "Estado civil", "Dropdown", false, "", 0, 0, false, ["Soletero","Casado","Divorciado","Viudo","Uniion Libre"]],
            ["experiencia", "¿Cuenta con experiencia en Salud y Belleza?", "Radio", false, "Si", 0, 0, false, ["Si","No"]],
            ["cualexperiancia", "Si tiene experiencia ¿Cual?", "Textarea", false, "", 0, 0, false],
            ["sutrabajoactual", "¿A qué se dedica actualmente?", "Textarea", false, "", 0, 0, false],
            ["negociopropio", "¿Posee algún negocio? ", "Radio", false, "Si", 0, 0, false, ["Si","No"]],
            ["experianciafran", " ¿Cuenta con experiencia en el sector franquicia? ", "Radio", false, "Si", 0, 0, false, ["Si","No"]],
            ["cualexperianciafran", "Especificar si tiene experiencia en Franquicias", "Textarea", false, "", 0, 0, false],
            ["queciudad", "¿En qué ciudad le interesa abrir una franquicia?", "TextField", false, "", 0, 256, false],
            ["localpropio", "¿Cuenta con local comercial?", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["uicacionmetros", "En caso de tener local propio anote ubicación y metros", "Textarea", false, "", 0, 0, false],
            ["fechadeseo", "Fecha en que desearía iniciar operación de su franquicia.", "Date", false, "", 0, 0, false],
            ["solventadapor", "¿Su inversión está solventada por? ", "Dropdown", false, "", 0, 0, false, ["Usted Solo","Sociedad","Familiar","Financiamiento- Especificar monto requerido.","Otro Especificar"]],
            ["especificarotro", "Si la opción es Otro o Financiamiento favor de Especificar", "Textarea", false, "", 0, 0, false],
            ["cargoquien", "A cargo de quién estaría la operación de su franquicia?", "Textarea", false, "", 0, 0, false],
            ["inversion", "A cuánto asciende el monto de lo que Usted desea invertir?", "Dropdown", false, "", 0, 0, false, ["Menos de $500000.00","De $5000000.00 a $1000000.00","Arriba de $10000000.00"]],
            ["comentarios", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["atendidopor", "Atendido por", "Dropdown", false, "", 0, 0, false, ["Osiris Ruvalcaba","Clarisa Macias","Dr Ignacio Garcia de la Paz","Ing. Ignacio Garcia de la Paz","Omar Garcia de la Paz"]],
            ["fechaprimercontacto", "Fecha de próximo contacto", "Datetime", false, "", 0, 0, false],
        ]);
		
		/*
		Row Format:
		["field_name_db", "Label", "UI Type", "Unique", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
        Module::generate("Module_Name", "Table_Name", "view_column_name" "Fields_Array");
        
		Module::generate("Books", 'books', 'name', [
            ["address",     "Address",      "Address",  false, "",          0,  1000,   true],
            ["restricted",  "Restricted",   "Checkbox", false, false,       0,  0,      false],
            ["price",       "Price",        "Currency", false, 0.0,         0,  0,      true],
            ["date_release", "Date of Release", "Date", false, "date('Y-m-d')", 0, 0,   false],
            ["time_started", "Start Time",  "Datetime", false, "date('Y-m-d H:i:s')", 0, 0, false],
            ["weight",      "Weight",       "Decimal",  false, 0.0,         0,  20,     true],
            ["publisher",   "Publisher",    "Dropdown", false, "Marvel",    0,  0,      false, ["Bloomsbury","Marvel","Universal"]],
            ["publisher",   "Publisher",    "Dropdown", false, 3,           0,  0,      false, "@publishers"],
            ["email",       "Email",        "Email",    false, "",          0,  0,      false],
            ["file",        "File",         "File",     false, "",          0,  1,      false],
            ["files",       "Files",        "Files",    false, "",          0,  10,     false],
            ["weight",      "Weight",       "Float",    false, 0.0,         0,  20.00,  true],
            ["biography",   "Biography",    "HTML",     false, "<p>This is description</p>", 0, 0, true],
            ["profile_image", "Profile Image", "Image", false, "img_path.jpg", 0, 250,  false],
            ["pages",       "Pages",        "Integer",  false, 0,           0,  5000,   false],
            ["mobile",      "Mobile",       "Mobile",   false, "+91  8888888888", 0, 20,false],
            ["media_type",  "Media Type",   "Multiselect", false, ["Audiobook"], 0, 0,  false, ["Print","Audiobook","E-book"]],
            ["media_type",  "Media Type",   "Multiselect", false, [2,3],    0,  0,      false, "@media_types"],
            ["name",        "Name",         "Name",     false, "John Doe",  5,  250,    true],
            ["password",    "Password",     "Password", false, "",          6,  250,    true],
            ["status",      "Status",       "Radio",    false, "Published", 0,  0,      false, ["Draft","Published","Unpublished"]],
            ["author",      "Author",       "String",   false, "JRR Tolkien", 0, 250,   true],
            ["genre",       "Genre",        "Taginput", false, ["Fantacy","Adventure"], 0, 0, false],
            ["description", "Description",  "Textarea", false, "",          0,  1000,   false],
            ["short_intro", "Introduction", "TextField",false, "",          5,  250,    true],
            ["website",     "Website",      "URL",      false, "http://dwij.in", 0, 0,  false],
        ]);
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('prospectos')) {
            Schema::drop('prospectos');
        }
    }
}

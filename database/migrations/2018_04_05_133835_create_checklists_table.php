<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Checklists", 'checklists', 'sucursal_id', 'fa-check-square', [
            ["sucursal_id", "Franquicia", "Dropdown", false, "", 0, 0, false, "@sucursals"],
            ["fecha", "Fecha", "Datetime", false, "", 0, 0, false],
            ["fachada1", "Cuenta con anuncio en letras separadas de aluminio", "Radio", false, "", 0, 0, false, ["Si","No","No Aplica"]],
            ["ponderaconfachada1", "Ponderación  1", "Decimal", false, "5", 0, 11, false],
            ["comentarios", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagenfachada1", "Imagen", "Image", false, "", 0, 0, false],
            ["fachada2", "El anuncio está debidamente iluminado", "Radio", false, "", 0, 0, false, ["Si","No","No Aplica"]],
            ["ponderacionfachada2", "Ponderación 2", "Decimal", false, "2.5", 0, 11, false],
            ["comentarios2", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen2", "Imagen", "Image", false, "", 0, 0, false],
            ["fachada3", "Cuenta con totem en el estacionamiento de la plaza en buen estado y con imagen actual", "Radio", false, "", 0, 0, false, ["Si","No","No Aplica"]],
            ["ponderacionfachada3", "Ponderación 3", "Decimal", false, "3", 0, 11, false],
            ["comentarios3", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen3", "Imagen", "Image", false, "", 0, 0, false],
            ["fachada4", "Cuenta con algun escaparate, isla, tripie, fuera de la sucursal", "Radio", false, "", 0, 0, false, ["Si","No","No Aplica"]],
            ["ponderacion4", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios4", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen4", "Imagen", "Image", false, "", 0, 0, false],
            ["fachada5", "La franquicia se encuentra en buen estado y con imagen actual", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion5", "Ponderación", "Decimal", false, "5", 0, 11, false],
            ["comentarios5", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen5", "Imagen", "Image", false, "", 0, 0, false],
            ["fachada6", "Se encuentra colocada la promoción del mes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacionfachada6", "Ponderación", "Decimal", false, "2.5", 0, 11, false],
            ["comentarios6", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen6", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta1", "Se encuentra el personal debidamente uniformado, filipina blanca cerrada con pantalón blanco y calzado blanco.", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion7", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios7", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen7", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta2", "La imagen del personal es adecuada (cabello recogido, maquillaje adecuado, accesorios discretos, uñas cortas, sin tatuajes visibles, pearsing etc.)", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion8", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios8", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen8", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta3", "La sucursal se encuentra con pintura en buen estado ", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion9", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios9", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen9", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta4", "La sucursal tiene plafones en  buen estado ", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion10", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios10", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen10", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta5", "La sucursal tiene letreros con logotipo vigente, de abierto y cerrado, regrese sus revistas, te escuchamos, de cámaras, vinil de bodega, etc.", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion11", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios11", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen11", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta6", "La sucursal cuenta con extintores y letreros de seguridad (ruta de evacuacion, extintor) ", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion12", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios12", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen12", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta7", " La sucursal se aprecia limpia y ordenada", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion13", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios13", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen13", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta8", "La sucursal esta libre de objetos no autorizados", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion14", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios14", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen14", "Imagen", "Image", false, "", 0, 0, false],
            ["imagenpregunta9", "La sucursal  solo tiene  la publicidad autorizada por el franquiciante", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion15", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios15", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen15", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion1", "La recepción cuenta con el vinil del logo vigente", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion16", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios16", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen16", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion2", "En la recepción se encuentra el acrílico con la promoción del mes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion17", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios17", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen17", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion3", "En la recepción se encuentran gráficos vigentes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion18", "Ponderación", "Decimal", false, "1.5", 0, 11, false],
            ["comentarios18", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen18", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion4", "En la recepción se encuentran volantes, folletos y tarjetas que apoyen la venta", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion19", "Ponderación", "Decimal", false, "1.5", 0, 11, false],
            ["comentarios19", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen19", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion5", "Se encuentra el escudo de franquicia certificada", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion20", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios20", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen20", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion6", "Cuenta con el mobiliario vigente autorizado", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion21", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios21", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen21", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion7", "Cuenta con exhibidor de producto", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion22", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios22", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen22", "Imagen", "Image", false, "", 0, 0, false],
            ["recepcion8", "El piso de la sucursal es el de la imagen vigente", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion23", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios23", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen23", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo1", "Las mesas de cubículo se encuentran libres de objetos no autorizados", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion24", "Ponderación", "Decimal", false, ".5", 0, 11, false],
            ["comentarios24", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen24", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo2", "Las mesas de cubículo se encuentran sin algodón y reblandecedor sobrante", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion25", "Ponderación", "Decimal", false, ".5", 0, 11, false],
            ["comentarios25", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen25", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo3", "Cuentan con motor y vibrador en buen estado", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion26", "Ponderación", "Decimal", false, ".5", 0, 11, false],
            ["comentarios26", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen26", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo4", "Todos los cubículos cuentan con el instrumental y equipo de trabajo autorizado y en óptimas condiciones", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion27", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios27", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen27", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo5", "El esterilizador líquido (Microdacyn) se encuentra activo", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion28", "Ponderación", "Decimal", false, ".5", 0, 11, false],
            ["comentarios28", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen28", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo6", "Los cubículos se aprecian limpios y ordenados", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion29", "Ponderación", "Decimal", false, ".5", 0, 11, false],
            ["comentarios29", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen29", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo7", "Los esmaltes para servicio se encuentran en buen estado", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion30", "Ponderación", "Decimal", false, ".5", 0, 11, false],
            ["comentarios30", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen30", "Imagen", "Image", false, "", 0, 0, false],
            ["cubiculo8", "Cuentan con la constancia de personal certificado", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion31", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios31", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen31", "Imagen", "Image", false, "", 0, 0, false],
            ["proceso1", "El personal saluda a los clientes que ingresan a la sucursal", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion32", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios32", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso2", "El personal ofrece café o té a sus clientes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion33", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios33", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso3", "El personal se presenta mencionando su nombre a los clientes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion34", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios34", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso4", "El personal utiliza kits de seguridad", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion35", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios35", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso5", "El personal utiliza cubrebocas y lentes de seguridad", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion36", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios36", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen36", "Imagen", "Email", false, "", 0, 256, false],
            ["proceso6", "El personal ofrece masaje con vibrador electromecánico a los clientes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion37", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios37", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso7", "Cuenta con contrato de empresa recolectora de residuos biológicos infecciosos", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion38", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios38", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["archivo1", "Agregar Copia", "File", false, "", 0, 0, false],
            ["proceso8", "Cuenta con seguro de la sucursal vigente (favor de agregar una copia)", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion39", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios39", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["archivo2", "Agregar Copia", "File", false, "", 0, 0, false],
            ["proceso9", "Cuenta con licencia de Salubridad (favor de agregar una copia)", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion40", "Ponderación", "Decimal", false, "2", 0, 256, false],
            ["comentarios40", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["archivo3", "Agregar Copia", "File", false, "", 0, 0, false],
            ["proceso10", "Cuenta con licencia municipal vigente (favor de agregar una copia)", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion41", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios41", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["archivo4", "Agregar Copia", "File", false, "", 0, 0, false],
            ["proceso11", "Cuentan con cámaras de seguridad activas y letreros de que se está filmando", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion42", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios42", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso12", "Cuentan con aviso de privacidad a la mano", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion43", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios43", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["proceso13", "Cuentan con manuales de calidad a la mano", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion44", "Ponderación", "Decimal", false, "1", 0, 11, false],
            ["comentarios44", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["inventario1", "Cuenta con producto promocional y de línea suficiente en exhibidor y almacén", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion45", "Ponderación", "Decimal", false, "10", 0, 11, false],
            ["comentarios45", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen45", "Imagen", "Image", false, "", 0, 0, false],
            ["inventario2", "Cuenta con la plantilla de personal completa y autorizada por el franquiciante", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion46", "Ponderación", "Decimal", false, "10", 0, 11, false],
            ["comentarios46", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen46", "Imagen", "Image", false, "", 0, 0, false],
            ["sistema4", "Utilizan el sistema punto de venta", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion47", "Ponderación", "Decimal", false, "3", 0, 11, false],
            ["comentarios47", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen47", "Imagen", "Image", false, "", 0, 0, false],
            ["sistema3", "Entregan notas o tickets de venta a todos los clientes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion48", "Ponderación ", "Decimal", false, "3", 0, 11, false],
            ["comentarios48", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen48", "Imagen", "Image", false, "", 0, 0, false],
            ["sistema2", "Entregan facturas a los clientes que lo solicitan", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion49", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios49", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen49", "Imagen", "Image", false, "", 0, 0, false],
            ["sistema1", "Ofrecen las promociones vigentes a los clientes", "Radio", false, "", 0, 0, false, ["Si","No"]],
            ["ponderacion50", "Ponderación", "Decimal", false, "2", 0, 11, false],
            ["comentarios50", "Comentarios", "Textarea", false, "", 0, 0, false],
            ["imagen50", "Imagen", "Image", false, "", 0, 0, false],
            ["calfinal", "Calificación Final", "Decimal", false, "", 0, 11, false],
            ["video", "Video", "URL", false, "", 0, 256, false],
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
        if (Schema::hasTable('checklists')) {
            Schema::drop('checklists');
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendCompromisoEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:compromiso';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar Correo notificando estatus de fecha de compromiso';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $compromisos = Compromiso::join('checklists','ckecklists.id','=','compromiso.cheklist_id')->join('sucursals','ckecklists.sucursal_id','=','sucursals.id')->select(array('compromisos.*','sucursals.nombresuc'))->whereNull('compromisos.deleted_at')->get();

           
           

     foreach($compromisos as $use){
            $proper1 = $use->sucursal;
            $compromisodate=$use->fechacompromiso;
            $compromiscoment=$use->comentariocompromiso;
            $compromisestatus=$use->estatuscompromiso;
            $compromisedias=$use->diffdays;
            $compromisemitaddias=$use->mitaddias;
            $compromisfechaenvio=$use->fechaenviocorreo;
            $datebegin=$use->created_at;
            $begin = new \DateTime();
            $goal = new \DateTime($compromiso->fechacompromiso);
            $interval = $goal->diff($begin);

            // %a will output the total number of days.
             $datebeg= $interval->format('%a');
             }
            
        $prop2 = str_replace('"', ' ', $proper1);
                     
        $fransuc = json_decode($prop2);         
           
        
        $franquiciatario = Franquiciatario::whereIN('id', $fransuc)->select(array('franquiciatarios.*'))->orderBy('id','DESC')->get();

        





        if($compromisestatus!='Finalizado'||$compromisestatus!='Finalizado Atrasado'){

            if(date('Y-m-d H:i:00') == $compromisfechaenvio||$datebeg == 1){
        
    foreach($franquiciatario as $user) {
 
        
        // Send the email to user
        Mail::queue('emails.compromisos',  array(
                            'name' => $user->nombrecompletofran,
                            'fechacompromiso' => $compromisodate,
                            'user_message' => $compromiscoment,
                            'estatus' =>  $compromisestatus
                        ), function ($mail) use ($user) {
            $mail->to($user['correofran'])
                ->from('gerencia_general@todoparasuspies.com', 'Todo Para Sus Pies')
                ->subject('Compromisa TPSP!');
        });
 
    }
 
    $this->info('Compromiso Enviado Exitósamente!');
      }
     }
   }
}

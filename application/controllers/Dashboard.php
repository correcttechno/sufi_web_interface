<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkLogined();
        $this->load->model('groups_model');
        $this->load->model('teachers_model');
        $this->load->model('audiences_model');
        $this->load->model('subjects_model');
        $this->load->model('schedules_model');
    }


    


    public function index(){

        $groupType='bachelor';
        $g=$this->input->get('groupType',true);
        if(isset($this->groups_model->groupTypes[$g])){
            $groupType=$g;
        }

        $groups=$this->groups_model->read($groupType);

        $selgroup           =$this->input->get('group',true);
        $selweektype        =$this->input->get('weektype',true);
        $teacher_id         =$this->input->get('teacher_id',true);

        $selectGoup="";
        $selectWeekType="";

        if(!empty($selgroup)){
            $selectGoup=$selgroup;
        }
        else{
            $selectGoup=isset($groups[0]['id'])==true?$groups[0]['id']:'';
        }

        if(!empty($selweektype)){
            $selectWeekType=$selweektype;
        }   
        else{
            $selectWeekType="top";
        }


        if($this->user_model->userdata['status']=='user' or !empty($teacher_id)){
            $this->load_model->load('userdashboardView',array("selectWeekType"=>$selectWeekType));
        }
        else{            
            $subjects=$this->subjects_model->read();
            $audiences=$this->audiences_model->read();

            $this->load_model->load('dashboardView',array('groupType'=>$groupType,'groups'=>$groups,'subjects'=>$subjects,'audiences'=>$audiences,"selectWeekType"=>$selectWeekType,"selectGroup"=>$selectGoup));
        }
        
    }
    


    public function read($group,$weektype,$teacher_id=''){
        
        $data=array();
        $results=array();
        if($this->user_model->userdata['status']=='user' or (!empty($teacher_id) and $teacher_id!='null')){
            $results=$this->schedules_model->readDataForTeacher((($teacher_id!='' and $teacher_id!='null')?$teacher_id:$this->user_model->userdata['id']),$weektype);
        }
        else{
            $results=$this->schedules_model->read($group,$weektype);
        }

        if($results){
            foreach($results as $r){
                $subject=$this->subjects_model->read_row($r['subject_id']);
                $teacher=$this->teachers_model->read_row($r['teacher_id']);
                $audience=$this->audiences_model->read_row($r['audience_id']);

                $subject_text="<b>Fənn: </b>".$subject['title'];
                $audience_text="<b>Otaq: </b>".$audience['title'];
                $teacher_text='<b>Müəllim: </b>'.$teacher['firstname']." ".$teacher['lastname'];
                $type_text='<b>Növ: </b>'.$this->subjects_model->types[$r['type']];
                $note_text=($r['note']!=''?'<b>Qeyd: </b>'.$r['note']:'');

                $teacher_text2='';
                $audience_text2='';

                $teacher_text3='';
                $audience_text3='';

                if(!empty($r['teacher_id2']) and !empty($r['audience_id2'])){
                    $teacher2=$this->teachers_model->read_row($r['teacher_id2']);
                    $audience2=$this->audiences_model->read_row($r['audience_id2']);

                    $teacher_text2='<br><b>Müəllim: </b>'.$teacher2['firstname']." ".$teacher2['lastname'];
                    $audience_text2="<br><b>Otaq: </b>".$audience2['title'];
                }

                if(!empty($r['teacher_id3']) and !empty($r['audience_id3'])){
                    $teacher3=$this->teachers_model->read_row($r['teacher_id3']);
                    $audience3=$this->audiences_model->read_row($r['audience_id3']);

                    $teacher_text3='<br><b>Müəllim: </b>'.$teacher3['firstname']." ".$teacher3['lastname'];
                    $audience_text3="<br><b>Otaq: </b>".$audience3['title'];
                }

                $title=$subject_text.'<br>'.$type_text.'<br>'.$teacher_text.'<br>'.$audience_text.$teacher_text2.$audience_text2.$teacher_text3.$audience_text3.'<br>'.$note_text;

                $classname='primary';
                if($r['type']=='seminar'){
                    $classname='important';
                }
                else if($r['type']=='practice'){
                    $classname='purple';
                }
                $data[]=array(
                    'id'            => $r['id'],
                    'title'         => $title,
                    'description'   =>$title,
                    'start'         => $this->schedules_model->getDayOfWeek($r['day'])." ".$r['start'],
                    'end'           => $this->schedules_model->getDayOfWeek($r['day'])." ".$r['end'],
                    'asDelete'      =>true,
                    'allDay'        =>false,
                    'className'     =>$r['merge']=='true'?"info":$classname,
                );
            }
        }
      
        
        echo json_encode($data);
    }

    public function add(){
        $group_id       =$this->input->post('group_id',true);
        $weektype       =$this->input->post('weektype',true);
        $subject_id     =$this->input->post('subject_id',true);
        $teacher_id     =$this->input->post('teacher_id',true);
        $audience_id    =$this->input->post('audience_id',true);

        $teacher_id2     =$this->input->post('teacher_id2',true);
        $audience_id2    =$this->input->post('audience_id2',true);

        $teacher_id3     =$this->input->post('teacher_id3',true);
        $audience_id3    =$this->input->post('audience_id3',true);
        
        $dvider         =$this->input->post('dvider',true);
        $day            =$this->input->post('day',true);
        $start          =$this->input->post('start',true);
        $end            =$this->input->post('end',true);
        $note           =$this->input->post('note',true);
        $merge          =$this->input->post('merge',true);
        $type           =$this->input->post('type',true);

        

        $response=array(
            'msg'   =>'',
            'status'=>false,
        );

        if($group_id=="" || $weektype=="" || $subject_id=="" || empty($teacher_id) || empty($audience_id) || $day=="" || $start=="" || $end==""){
            $response['msg']="Zəhmət olmasa *-li olan xanaları doldurun";
        }
        else{
            $data=array(
                'group_id'      =>$group_id,
                'weektype'      =>$weektype,
                'subject_id'    =>$subject_id,
                'teacher_id'    =>$teacher_id,
                'audience_id'   =>$audience_id,
                'day'           =>$day,
                'start'         =>$start,
                'end'           =>$end,
                'note'          =>$note,
                'merge'         =>$merge==Null?'false':'true',
                'type'          =>$type,   
            );

            if($dvider=='true'){
                $data['teacher_id2']=$teacher_id2;
                $data['audience_id2']=$audience_id2;

                $data['teacher_id3']=$teacher_id3;
                $data['audience_id3']=$audience_id3;
            }


            $check          =$this->schedules_model->check_data($weektype,$day,$start,$end,$audience_id);
            $check_teacher  =$this->schedules_model->check_data_teacher($weektype,$day,$start,$end,$teacher_id);

            if($check==false and $dvider=='true'){
                $check=$this->schedules_model->check_data($weektype,$day,$start,$end,$audience_id2);
                if($check==false){
                    $check=$this->schedules_model->check_data($weektype,$day,$start,$end,$audience_id3);
                }
            }

            if($check_teacher==false and $dvider=='true'){
                $check_teacher=$this->schedules_model->check_data_teacher($weektype,$day,$start,$end,$teacher_id2);
                if($check_teacher==false){
                    $check_teacher=$this->schedules_model->check_data_teacher($weektype,$day,$start,$end,$teacher_id3);
                }
            }

            if(($check and $check['merge']=="false")){
                $gr=$this->groups_model->read_row($check['group_id']);
                $au=$this->audiences_model->read_row($check['audience_id']);
                $response['msg']="Qeyd etdiyiniz saatlarda <b>{".$gr['title']."}</b> qrupunun <b>{".$au['title']."}</b> auditoriyasında dərsi vardır !";
            }
            else if(($check_teacher and $check_teacher['merge']=="false")){
                $gr=$this->groups_model->read_row($check_teacher['group_id']);
                $au=$this->audiences_model->read_row($check_teacher['audience_id']);
                $response['msg']="Qeyd etdiyiniz saatlarda Müəllimin <b>{".$gr['title']."}</b> qrupuna <b>{".$au['title']."}</b> auditoriyasında dərsi vardır !";
            }
            else{

                if($dvider=='true'){

                }

                if($check and $check['merge']=="true"){
                    $data['merge']="true";
                }

                $result=$this->schedules_model->add($data);
                $response['msg']="Dərs əlavə olundu";
                $response['status']=true;
            }
           
        }


        echo json_encode($response);
    }

    public function delete(){
        $id=$this->input->post('delete_id',true);
        $ar=array(
            'msg'   =>'Dərs silindi',
            'status'=>false,
        );
        if(!empty($id)){
            $check=$this->schedules_model->read_row($id);
            if($check['user_id']==$this->user_model->userdata['id']){
                $this->schedules_model->delete($id);    
                $ar['status']=true;
            }
            else{
                $ar['msg']="Bu dərs sizin tərəfinizdən əlavə edilməyib !";
            }
        }
        echo json_encode($ar);
    }

    public function read_row(){
        $id=$this->input->post('id',true);
        if(!empty($id)){
            $result=$this->schedules_model->read_row($id);
            if($result){
                //$result['start']=rtrim($result['start'],':00');
                //$result['end']=rtrim($result['end'],':00');
                echo json_encode($result);
            }
        }
    }
}
<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
 * Flight23011
*/
class Flight23011Controller extends AppController
{
    /**
     * index method
     */
    public function index()
    {
        //$flights = $this->paginate($this->Flights);
        //$this->set(compact('flights'));
        $this->viewBUilder()->setLayout('my_default');
    }
    public function page3(){
        $this->viewBUilder()->setLayout('my_default');

        $year = 2024;
        $month = 3;
        $day = 2;
        $departure_place = '那覇';
        $arrival_place = '南大東';

        if ($this->request->getSession()->check('repost')
            &&$this->request->getSession()->read('repost')){
            $year   = $this->request->getSession()->read( 'year', $year);
            $month  = $this->request->getSession()->read( 'month', $month);
            $day    = $this->request->getSession()->read( 'day', $day);
            $departure_place    = $this->request->getSession()->read( 'departure_place', $departure_place);
            $arrival_place      = $this->request->getSession()->read( 'arrival_place', $arrival_place);
        }

        $flights_tbl = TableRegistry::getTableLocator()->get('Flights');
        $flights_list = $flights_tbl->find('all')->toArray();
        $flights_reservation = array();
        foreach($flights_list as $flight){
            if($flight->departure_place == $departure_place && $flight->arrival_place == $arrival_place){
                

                $tbl = TableRegistry::getTableLocator()->get('Reservations');
                
                $business_count = count($tbl
                    ->find('all')
                    ->where(['year'=>$year,'month'=>$month,'day'=>$day])
                    ->where(['flight_id'=>$flight->id])
                    ->where(['seat_class'=>0])->toArray());

                if($business_count == $flight->cap_business){
                    $business_state = 0;
                }else if($business_count <= 0){
                    $business_state = 2;
                }else{
                    $business_state = 1;
                }
                
                $economy_count = count($tbl
                    ->find('all')
                    ->where(['year'=>$year,'month'=>$month,'day'=>$day])
                    ->where(['flight_id'=>$flight->id])
                    ->where(['seat_class'=>1])->toArray());

                if($economy_count == $flight->cap_economy){
                    $economy_state = 0;
                }else if($economy_count <= 5){
                    $economy_state = 2;
                }else{
                    $economy_state = 1;
                }
                
                $flights_reservation[]=['flight'=>$flight,'business_state'=>$business_state,'economy_state'=>$economy_state];
            }
        }



        $this->set( 'year', $year);
        $this->set( 'month', $month);
        $this->set( 'day', $day);
        $this->set( 'departure_place', $departure_place);
        $this->set( 'arrival_place', $arrival_place);

        $this->set( 'flights_reservation', $flights_reservation);

        $this->request->getSession()->delete( 'year', $year);
        $this->request->getSession()->delete( 'month', $month);
        $this->request->getSession()->delete( 'day', $day);
        $this->request->getSession()->delete( 'departure_place', $departure_place);
        $this->request->getSession()->delete( 'arrival_place', $arrival_place);

        $this->request->getSession()->delete( 'repost');
    }
    public function page4()
    {
        //display f view
        $this->viewBUilder()->setLayout('my_default');
        
        if ($this->request->is('post')){
            //get postData
            $departure_place = $this->request->getData( 'departure_place' );
            if(empty($departure_place)){
                $this->Flash->set( h("出発地を選択してください") );
                return;
            }
            $arrival_place = $this->request->getData( 'arrival_place' );
            if(empty($arrival_place)){
                $this->Flash->set( h("到着地を選択してください") );
                return;
            }
            if($departure_place==$arrival_place){
                $this->Flash->set( h("「".$departure_place."」から「".$arrival_place."」行きの航空便が見つかりませんでした") );
                return;
            }

            $year = $this->request->getData( 'year' );
            $month = $this->request->getData( 'month' );
            $day = $this->request->getData( 'day' );

            $this->request->getSession()->write( 'year', $year);
            $this->request->getSession()->write( 'month', $month);
            $this->request->getSession()->write( 'day', $day);
            $this->request->getSession()->write( 'departure_place', $departure_place);
            $this->request->getSession()->write( 'arrival_place', $arrival_place);

            $this->request->getSession()->write( 'repost', true);

            return $this->redirect( [ 'action' => 'page3' ] );
        }
    }

    public function example(){
        //display example view
        $this->viewBuilder()->setLayout('my_default');
        //if request post 
        if ($this->request->is('post')) {
            //get postData
            $someDataValue = $this->request->getData('some_data_label');
            $tbl = TableRegistry::getTableLocator()->get('TableName');
            //if postData in table
            if($tbl->exists(['some_data_labe'=>$someDataValue])){
                //get targetData in table
                $targetData = $tbl->get($someDataValue,['contain' => ['OtherTableName']]);
                Log::debug( strval($targetData) );
                //if can do something with targetData
                if(count($targetData['targe_data_lable'] < 123)){
                    //do something with targetData
                    $this->request->getSession()->write( 'targe_data_lable', $targetData );
                    //redirect controller,action
                }                    
                //else flash error
            }
            //else flash error   
        } 
    }
}

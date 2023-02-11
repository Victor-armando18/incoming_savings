<?php
    
    use activity\Activity;
    use activity\ActivityRepository;

    require_once __DIR__."/AtivityRepository.php";

    final class ActivityRepositoryInMemoryImpl implements ActivityRepository{
        
        private $activities = array(
            'ANG'=>'Angola',
            'BR'=>'Brasil',
            'NGA'=>'Nigeria',
        );

        public function save(Activity $activity): void {
            $this->activities[$activity->getName()] = $activity;
        }
        
        public function getByName(string $value){
            if(array_key_exists($value, $this->activities)){
                return $this->activities[$value];
            }
            return null;
        }

        public function getAll(): array {
            return $this->activities;
        }
    }
    
    // $ac = new ActivityRepositoryInMemoryImpl();
    // $ac->save(new Activity('ANG'));
    // $ac->save(new Activity('BR'));
    // $ac->save(new Activity('NGA'));

?>
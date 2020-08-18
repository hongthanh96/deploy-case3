<?php
    namespace App\Repositories;

use App\User;
use App\Repositories\UserRepositoryInterface;
use App\Userinformation;

class UserRepository implements UserRepositoryInterface{
        public function all(){
            $users = User::select('users.*','userinformations.phone','userinformations.image','userinformations.block','userinformations.role')
                    ->join('userinformations','users.id','=','userinformations.user_id')
                    ->get();
            return $users;
        }
        public function findById($idUser){
            $user = User::select('users.id','users.name','userinformations.gender','userinformations.DOB','userinformations.phone','userinformations.address')
                    ->join('userinformations','users.id', '=','userinformations.user_id')
                    ->where('users.id',$idUser)
                    ->get();
            return $user;
        }

        public function findAdmin($idAdmin,$request){
            if($request['isAdmin'] == 0){
            $user = User::where('id',$idAdmin)->update(['isAdmin' => 1]);
            }

            else{
                $user = User::where('id',$idAdmin)->update(['isAdmin' => 0]);
            }
            return $user;
        }
        public function findRole($idUser, $requests){
            if($requests['role'] == 0){
                $user = Userinformation::where('user_id',$idUser)->update(['role' => 1]);
                return $user;
            }
            else{
                $user = Userinformation::where('user_id',$idUser)->update(['role' => 0]);
                return $user;
            }
        }

        public function findBlock($idUser, $requests){
            if($requests['block'] == 0){
                $user = Userinformation::where('user_id',$idUser)->update(['block' => 1]);
                return $user;
            }
            else{
                $user = Userinformation::where('user_id' ,$idUser)->update(['block' => 0]);
                return $user;
            }
        }

        public function editUser($idUser){
            $users = User::select('users.name','users.email','users.password','userinformations.*')
                    ->join('userinformations','users.id','=','userinformations.user_id')
                    ->where('userinformations.user_id',$idUser)
                    ->get();
            return $users;
        }

        public function updateUser($requests){
            // dd($requests);
            $user = User::findOrFail($requests['id'])->update(['name' => $requests['name']]);
            // dd();
            Userinformation::find($requests['idUser'])->update([
                'DOB' => $requests['DOB'],
                'phone' => $requests['phone'],
                'address' => $requests['address'],
                'image' => $requests['avatar']
            ]);

            return $user;
        }
    }

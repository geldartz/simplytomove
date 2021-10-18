export default class Gate{

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.type === 'admin';
    }
    isUser(){
        return this.user.type === 'user';
    }

    isTenant(){
        return this.user.type === 'tenant';
    }
    isLandLord(){
        return this.user.type === 'landlord';
    }
    isAgency(){
        return this.user.type === 'agency';
    }
    isAgent(){
        return this.user.type === 'agent';
    }
    
    isAllUser(){
        if(this.user.type === 'tenant' || this.user.type === 'agency' || this.user.type === 'agent' || this.user.type === 'landlord'){
            return true;
        }
    }
}


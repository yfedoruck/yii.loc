Dx = {};
Dx.test = function(){
		return "hello";
}

theApp = {};  
  
theApp.Person = function() {  
  
  var Person = function() {  
   this.sayHelloTo = function(anotherPerson) {  
      return 'Hello, ' + anotherPerson + '!';  
    };  
  
   // Add this method  
   this.sayGoodNight = function() {  
     return 'Good night!';  
   };  
  };  
  
  return Person;  
  
};  



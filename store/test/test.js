var assert = require("assert");
var expect = require('chai').expect;
require('../js/dropbox.js');
require('../js/test.js');

//console.log(Dropbox);

describe('Array', function(){
  describe('#indexOf()', function(){
    it('should return -1 when the value is not present', function(){
      assert.equal(-1, [1,2,3].indexOf(5));
      assert.equal(-1, [1,2,3].indexOf(0));
    })
  })
});
		var arr = [];
		arr.push('foo');
		arr.push('bar');
describe('Array', function(){
  describe('#push1()', function(){
    it('test Array push', function(){
		expect(arr[0]).to.equal('foo');
		expect(arr[1]).to.equal('bar');
    })
  })
});

console.log(Dx.test);
describe('Dropbox', function(){
  describe('#test())', function(){
    it('test Array push', function(){
		var obj = Dx.test();
		//var DxIns = new test();
		expect(obj).to.equal('hello');
    })
  })
});
console.log(theApp.Person);
describe('Dropbox', function(){
  describe('#test())', function(){
    it('test Array push', function(){
    var Person = theApp.Person();  
    var personInstance = new Person();  
    var message = personInstance.sayHelloTo('adomokos');  
  
    expect(message).to.equal('Hello, adomokos!'); 
    })
  })
})

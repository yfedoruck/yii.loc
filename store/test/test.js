var assert = require("assert");
var expect = require('chai').expect;

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
  describe('#push()', function(){
    it('test Array push', function(){
		expect(arr[0]).to.equal('foo');
		expect(arr[1]).to.equal('bar');
    })
  })
});


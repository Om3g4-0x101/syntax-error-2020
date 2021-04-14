var budgetController = (function() {
    
    var prices_data =[];
    var quantities_data = [];

    return {
        addItems : function(dictp, dictq) {
            var i=0;
            var j=0;
            for (var key in dictp) if (dictp.hasOwnProperty(key)) {
                prices_data[i] = dictp[key];
                i++;
            }

            for (var keys in dictq) if (dictq.hasOwnProperty(keys)) {
                quantities_data[j] = dictq[keys];
                j++;
            }
            
        },
        getTotal : function() {
            var total =0;
            var p;
            for(p=0;p<10;p++){
                
                    total +=(prices_data[p] * quantities_data[p]);
                  
            }

            var z;
            for(z=0;z<10;z++){
                document.querySelector('#quantity_'+z).textContent = quantities_data[z];
            }
            var c;
            for(c=0;c<10;c++){
                if(quantities_data[c] == 0){
                    
                    document.querySelector('#item_'+c).classList.add('ion-ios-close-empty');
                    document.querySelector('#item_'+c).classList.remove('ion-ios-checkmark-empty');
                }
            }

            return total;
        },

        addBillItem : function(dictp,dictq) {
            
            
        }
    };

})();


var UIController = (function(){

    return {
        getprices: function() {
            return {
                price_0 : parseInt(document.getElementById('dish_price-0').innerHTML),
                price_1 : parseInt(document.getElementById('dish_price-1').innerHTML),
                price_2 : parseInt(document.getElementById('dish_price-2').innerHTML),
                price_3 : parseInt(document.getElementById('dish_price-3').innerHTML),
                price_4 : parseInt(document.getElementById('dish_price-4').innerHTML),
                price_5 : parseInt(document.getElementById('dish_price-5').innerHTML),
                price_6 : parseInt(document.getElementById('dish_price-6').innerHTML),
                price_7 : parseInt(document.getElementById('dish_price-7').innerHTML),
                price_8 : parseInt(document.getElementById('dish_price-8').innerHTML),
                price_9 : parseInt(document.getElementById('dish_price-9').innerHTML)
            };
        },
        getquantities: function(){
            return {
                quan_0 : parseInt(document.querySelector('.qty-0').value),
                quan_1 : parseInt(document.querySelector('.qty-1').value),
                quan_2 : parseInt(document.querySelector('.qty-2').value),
                quan_3 : parseInt(document.querySelector('.qty-3').value),
                quan_4 : parseInt(document.querySelector('.qty-4').value),
                quan_5 : parseInt(document.querySelector('.qty-5').value),
                quan_6 : parseInt(document.querySelector('.qty-6').value),
                quan_7 : parseInt(document.querySelector('.qty-7').value),
                quan_8 : parseInt(document.querySelector('.qty-8').value),
                quan_9 : parseInt(document.querySelector('.qty-9').value)
            };
        },

        displayTotal: function(tot) {
            document.querySelector('.Total_val').textContent = tot;
            document.querySelector('.main-subtotal').textContent = tot;
        }
        
    };

    

})();

var controller = (function(budgetCtrl, UICtrl) {

    var ctrlAddItem = function() {
        
        var input_prices = UICtrl.getprices();
        var input_quantities = UICtrl.getquantities();
        budgetCtrl.addItems(input_prices,input_quantities);
    
        var subtotal = budgetCtrl.getTotal();
        window.myvar = subtotal;
        console.log('Hi');
        document.getElementById('to_bill').focus();
        document.getElementById('xyz').value = window.myvar.toString();
        
        
        UICtrl.displayTotal(subtotal);
    }

    

    document.querySelector(".confirm").addEventListener('click',function(){
        console.log(document.getElementById('dish_price-1').innerHTML);
    });

    document.querySelector(".confirm").addEventListener('click',ctrlAddItem);

})(budgetController,UIController);
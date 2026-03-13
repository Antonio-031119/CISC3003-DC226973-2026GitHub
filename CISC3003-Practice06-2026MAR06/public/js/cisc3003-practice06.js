/* add loop and other code here ... in this simple exercise we are not
   going to concern ourselves with minimizing globals, etc */
   
let subTotal = 0; // 初始化小计

//循环生成购物车
for(let i=0; i<filenames.length; i++){
	const rowTotal= calculateTotal( quantities[i], prices[i] );
	subTotal += rowTotal;
	outputCartRow (filenames[i], titles[i], quantities[i], prices[i], rowTotal);
};


// 计算税费
const taxRate = 0.10;
const tax = calculateTax(subTotal,taxRate);

//计算运费
const shipping = calculateShipping(subTotal,10000);

// 计算总计
const grandTotal = calculateGrandTotal(subTotal,tax,shipping);


// 输出计算结果到页面（替换硬编码值）
document.write(`
    <tr class="totals">
        <td colspan="4">Subtotal</td>
        <td>${outputCurrency(subTotal)}</td>
    </tr>
    <tr class="totals">
        <td colspan="4">Tax</td>
        <td>${outputCurrency(tax)}</td>
    </tr>
    <tr class="totals">
        <td colspan="4">Shipping</td>
        <td>${outputCurrency(shipping)}</td>
    </tr>
    <tr class="totals focus">
        <td colspan="4">Grand Total</td>
        <td>${outputCurrency(grandTotal)}</td>
    </tr>
`);
/* define functions here */



function calculateTotal( quantity, price ){
	return quantity*price;
}
function outputCartRow (file, title, quantity, price, total) { 
	document.write(`
		<tr>
			<td><img src="Images/${file}" alt="${title}"></td>
			<td>${title}</td>
			<td>${quantity}</td>
			<td>${outputCurrency(price)}</td>
			<td>${outputCurrency(total)}</td>
		</tr>
		`
	);
	
}
function calculateTax(subtotal, rate){
	return subtotal*rate;
}

function calculateShipping(subtotal, threshold){
	return subtotal > threshold ? 0 : 40;
}

function calculateGrandTotal(subtotal,tax,shipping){
	return subtotal+tax+shipping;
}
function outputCurrency(num){
	const validNum = typeof num === 'number' && !isNaN(num) ? num : 0;
	return `$${validNum.toFixed(2)}`;
}

        

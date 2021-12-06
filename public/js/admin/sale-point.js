var products = [];
var saleDescriptions = [];

getProducts()

async function getProducts()
{
    products =  await (await fetch('/api/products?template=sale-point')).json()    
}

function suggestProducts()
{
    const termToSearch = document.getElementById('termToSearch').value.trim().toUpperCase();
    const sugestedProductsHTML = document.getElementById('sugestedProducts');
    sugestedProductsHTML.innerHTML = ''

    products.forEach(item => {
        const productLargeName = (item.name + " - " + item.brand).toLocaleUpperCase()
        if(productLargeName.includes(termToSearch)) {
            console.log(productLargeName)
            sugestedProductsHTML.innerHTML += `
                <div onclick='completeSearchTerm(${item.id})'>
                    ${productLargeName}
                </div>
            `

        }
    })
}

function abortSugest()
{
    const sugestedProductsHTML = document.getElementById('sugestedProducts');
    sugestedProductsHTML.innerHTML = ''
}

function completeSearchTerm(id) {
    products.forEach((product) => {
        console.log(product)
        if(product.id == id) {
            document.getElementById('termToSearch').value = product.name
            document.getElementById('sugestedProducts').innerHTML = ''
            return;
        }
    })
}

function addProduct()
{
    const termToSearch = document.getElementById('termToSearch').value.trim().toUpperCase();
    const productQuantity = parseInt(document.getElementById('quantity').value)
    for (let index = 0; index < products.length; index++) {
        

        if(products[index].name.toUpperCase() == termToSearch) {

            document.getElementById('quantity').value = '1'
            document.getElementById('termToSearch').value = ''
            document.getElementById('termToSearch').focus()

            for (let i = 0; i < saleDescriptions.length; i++) {                

                if(saleDescriptions[i].product.id == products[index].id) {
                    saleDescriptions[i].quantity += productQuantity
                    saleDescriptions[i].subtotal = saleDescriptions[i].quantity * saleDescriptions[i].amount
                    syncDescriptionsTable()
                    return;
                }
                
            }

            saleDescriptions.push({
                product: products[index],
                quantity: productQuantity,
                amount: products[index].sale_price,
                subtotal: products[index].sale_price * productQuantity,
            });
            syncDescriptionsTable()
            break;
        }
        
    }
}

function deleteDescription(index)
{
    saleDescriptions.splice(index, 1);
    syncDescriptionsTable();
}

function getTotal() {
    var total = 0;
    saleDescriptions.forEach(item => {
        total += item.subtotal;
    });
    return total;
}

async function processCheckout()
{
    const payload = {
        amount: getTotal(),
        descriptions: saleDescriptions
    }
    const settings =  {
        method: 'POST', 
        headers: {
          'Content-Type': 'application/json' 
        },         
        body: JSON.stringify(payload) 
      }
    const response =  await (await fetch('/api/sales', settings)).json()    

    window.location.href = '/admin/sales/' + response.id;
}

function syncDescriptionsTable()
{
    const descriptionsHTML = document.getElementById('descriptionsTBody')
    const totalInput = document.getElementById('total')
    const ivaInput = document.getElementById('iva')
    var total = 0;

    descriptionsHTML.innerHTML = ''

    saleDescriptions.forEach((item, index) => {
        total += item.subtotal;
        descriptionsHTML.innerHTML += `
            <tr>
                <th>${index + 1}</th>
                <th>${item.product.name}</th>
                <th>${item.quantity}</th>
                <th>$ ${item.amount}</th>
                <th>$ ${item.subtotal}</th>
                <th>
                    <button class='btn btn-danger' onclick='deleteDescription(${index})'>Delete</button>
                </th>
            </tr>`
    })

    totalInput.value = total 
    ivaInput.value = total *.16 
}
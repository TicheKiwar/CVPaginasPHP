class suma{
    constructor(numero1, numero2){
        this.numero1=numero1
        this.numero2=numero2

    }

    sumarN (){
        return this.numero1+this.numero2
    }
}
function sumarnumeros(){
    let var1 = parseInt(document.getElementById("num1").value)
    let var2 = parseInt(document.getElementById("num2").value)
    let obj = new suma(var1,var2)
    document.getElementById("suma").innerText=obj.sumarN()

}
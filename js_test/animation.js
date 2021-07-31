

let container_height = document.querySelector(".main_container").offsetHeight;
let container_width = document.querySelector(".main_container").offsetWidth;
let blue_box = document.querySelector(".square");
let animation_direction = 0; 
// first i take the height and width of the main container
// console.log( blue_box);
console.log("Screen height: " + container_height +"\n"+ "Screen width: " + container_width);
//then take the position left and top for the box...then the logics are if my boxs position is not more then the height and width of the container
// position for the box will increase with 10 px when the box position will go close to the height of the screen the travel axis will reset for the box
let magicSquare= () =>{
    let left = blue_box.offsetLeft;
    let top= blue_box.offsetTop;

    (left+140)>=container_width || (top+140)>=container_height? animation_direction =1: left <=10 ? animation_direction=0:"";

    (animation_direction)===0? (left=left+10, top=top+10):(left=left-10 ,top=top-10);
    blue_box.style.left = left + "px"; 
    blue_box.style.top = top + "px"; 
 



}
// will call the magicSquare function every 1 sec
setInterval(function(){ 
	magicSquare();
console.log("magicSquare function is called.");
}, 1000);//

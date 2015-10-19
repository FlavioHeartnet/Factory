
/* modifica variaveis */
var boxSizeArray = [4,4,4,3,7];	// Matriz que indica quantos itens há rooom para na coluna da direita ULs


var verticalSpaceBetweenListItems = 3;	// Pixels espaço entre uma <li> e no próximo
// Mesmo valor ou superior como margem inferior em CSS para #dhtmlgoodies_dragDropContainer ul li, li # dragContent


var indicateDestionationByUseOfArrow = true;	// Seta visor para indicar onde objeto será descartado (false = uso retângulo)

var cloneSourceItems = false;	// Itens colhidos a partir recipiente principal será clonado (ou seja, "cópia" em vez de "corte").
var cloneAllowDuplicates = false;	// Permitir várias instâncias de um item dentro de uma pequena caixa (exemplo: arrastar Student 1 à equipa A duas vezes

/* VARIÁVEIS END você pode modificar */

var dragDropTopContainer = false;
var dragTimer = -1;
var dragContentObj = false;
var contentToBeDragged = false;	// Referência para arrastado <li>
var contentToBeDragged_src = false;	// Referência ao pai de <li> antes de arrastar começou
var contentToBeDragged_next = false; 	// Referência ao próximo irmão de <li> para ser arrastado
var destinationObj = false;	// Referência ao <UL> ou <LI> elemento é onde caiu.
var dragDropIndicator = false;	// Referência a pequena seta indicando onde os itens serão descartados
var ulPositionArray = new Array();
var mouseoverObj = false;	// Referência para destaque DIV

var MSIE = navigator.userAgent.indexOf('MSIE')>=0?true:false;
var navigatorVersion = navigator.appVersion.replace(/.*?MSIE (\d\.\d).*/g,'$1')/1;

var arrow_offsetX = -5;	// Deslocamento X - posição da pequena seta
var arrow_offsetY = 0;	// Deslocamento Y - a posição da pequena seta

if(!MSIE || navigatorVersion > 6){
    arrow_offsetX = -6;	// Firefox - deslocamento Y pequena seta
    arrow_offsetY = -13; // Firefox - deslocamento Y pequena seta
}

var indicateDestinationBox = false;
function getTopPos(inputObj)
{
    var returnValue = inputObj.offsetTop;
    while((inputObj = inputObj.offsetParent) != null){
        if(inputObj.tagName!='HTML')returnValue += inputObj.offsetTop;
    }
    return returnValue;
}

function getLeftPos(inputObj)
{
    var returnValue = inputObj.offsetLeft;
    while((inputObj = inputObj.offsetParent) != null){
        if(inputObj.tagName!='HTML')returnValue += inputObj.offsetLeft;
    }
    return returnValue;
}

function cancelEvent()
{
    return false;
}
function initDrag(e)	// Botão do mouse é pressionado para baixo em um LI
{
    if(document.all)e = event;
    var st = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
    var sl = Math.max(document.body.scrollLeft,document.documentElement.scrollLeft);

    dragTimer = 0;
    dragContentObj.style.left = e.clientX + sl + 'px';
    dragContentObj.style.top = e.clientY + st + 'px';
    contentToBeDragged = this;
    contentToBeDragged_src = this.parentNode;
    contentToBeDragged_next = false;
    if(this.nextSibling){
        contentToBeDragged_next = this.nextSibling;
        if(!this.tagName && contentToBeDragged_next.nextSibling)contentToBeDragged_next = contentToBeDragged_next.nextSibling;
    }
    timerDrag();
    return false;
}

function timerDrag()
{
    if(dragTimer>=0 && dragTimer<10){
        dragTimer++;
        setTimeout('timerDrag()',10);
        return;
    }
    if(dragTimer==10){

        if(cloneSourceItems && contentToBeDragged.parentNode.id=='allItems'){
            newItem = contentToBeDragged.cloneNode(true);
            newItem.onmousedown = contentToBeDragged.onmousedown;
            contentToBeDragged = newItem;
        }
        dragContentObj.style.display='block';
        dragContentObj.appendChild(contentToBeDragged);
    }
}

function moveDragContent(e)
{
    if(dragTimer<10){
        if(contentToBeDragged){
            if(contentToBeDragged_next){
                contentToBeDragged_src.insertBefore(contentToBeDragged,contentToBeDragged_next);
            }else{
                contentToBeDragged_src.appendChild(contentToBeDragged);
            }
        }
        return;
    }
    if(document.all)e = event;
    var st = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
    var sl = Math.max(document.body.scrollLeft,document.documentElement.scrollLeft);


    dragContentObj.style.left = e.clientX + sl + 'px';
    dragContentObj.style.top = e.clientY + st + 'px';

    if(mouseoverObj)mouseoverObj.className='';
    destinationObj = false;
    dragDropIndicator.style.display='none';
    if(indicateDestinationBox)indicateDestinationBox.style.display='none';
    var x = e.clientX + sl;
    var y = e.clientY + st;
    var width = dragContentObj.offsetWidth;
    var height = dragContentObj.offsetHeight;

    var tmpOffsetX = arrow_offsetX;
    var tmpOffsetY = arrow_offsetY;

    for(var no=0;no<ulPositionArray.length;no++){
        var ul_leftPos = ulPositionArray[no]['left'];
        var ul_topPos = ulPositionArray[no]['top'];
        var ul_height = ulPositionArray[no]['height'];
        var ul_width = ulPositionArray[no]['width'];

        if((x+width) > ul_leftPos && x<(ul_leftPos + ul_width) && (y+height)> ul_topPos && y<(ul_topPos + ul_height)){
            var noExisting = ulPositionArray[no]['obj'].getElementsByTagName('LI').length;
            if(indicateDestinationBox && indicateDestinationBox.parentNode==ulPositionArray[no]['obj'])noExisting--;
            if(noExisting<boxSizeArray[no-1] || no==0){
                dragDropIndicator.style.left = ul_leftPos + tmpOffsetX + 'px';
                var subLi = ulPositionArray[no]['obj'].getElementsByTagName('LI');

                var clonedItemAllreadyAdded = false;
                if(cloneSourceItems && !cloneAllowDuplicates){
                    for(var liIndex=0;liIndex<subLi.length;liIndex++){
                        if(contentToBeDragged.id == subLi[liIndex].id)clonedItemAllreadyAdded = true;
                    }
                    if(clonedItemAllreadyAdded)continue;
                }

                for(var liIndex=0;liIndex<subLi.length;liIndex++){
                    var tmpTop = getTopPos(subLi[liIndex]);
                    if(!indicateDestionationByUseOfArrow){
                        if(y<tmpTop){
                            destinationObj = subLi[liIndex];
                            indicateDestinationBox.style.display='block';
                            subLi[liIndex].parentNode.insertBefore(indicateDestinationBox,subLi[liIndex]);
                            break;
                        }
                    }else{
                        if(y<tmpTop){
                            destinationObj = subLi[liIndex];
                            dragDropIndicator.style.top = tmpTop + tmpOffsetY - Math.round(dragDropIndicator.clientHeight/2) + 'px';
                            dragDropIndicator.style.display='block';
                            break;
                        }
                    }
                }

                if(!indicateDestionationByUseOfArrow){
                    if(indicateDestinationBox.style.display=='none'){
                        indicateDestinationBox.style.display='block';
                        ulPositionArray[no]['obj'].appendChild(indicateDestinationBox);
                    }

                }else{
                    if(subLi.length>0 && dragDropIndicator.style.display=='none'){
                        dragDropIndicator.style.top = getTopPos(subLi[subLi.length-1]) + subLi[subLi.length-1].offsetHeight + tmpOffsetY + 'px';
                        dragDropIndicator.style.display='block';
                    }
                    if(subLi.length==0){
                        dragDropIndicator.style.top = ul_topPos + arrow_offsetY + 'px'
                        dragDropIndicator.style.display='block';
                    }
                }

                if(!destinationObj)destinationObj = ulPositionArray[no]['obj'];
                mouseoverObj = ulPositionArray[no]['obj'].parentNode;
                mouseoverObj.className='mouseover';
                return;
            }
        }
    }
}

/* Arrastamento Fim Coloque <LI> em um destino ou de volta para onde veio.  */
function dragDropEnd(e)
{
    if(dragTimer==-1)return;
    if(dragTimer<10){
        dragTimer = -1;
        return;
    }
    dragTimer = -1;
    if(document.all)e = event;


    if(cloneSourceItems && (!destinationObj || (destinationObj && (destinationObj.id=='allItems' || destinationObj.parentNode.id=='allItems')))){
        contentToBeDragged.parentNode.removeChild(contentToBeDragged);
    }else{

        if(destinationObj){
            if(destinationObj.tagName=='UL'){
                destinationObj.appendChild(contentToBeDragged);
            }else{
                destinationObj.parentNode.insertBefore(contentToBeDragged,destinationObj);
            }
            mouseoverObj.className='';
            destinationObj = false;
            dragDropIndicator.style.display='none';
            if(indicateDestinationBox){
                indicateDestinationBox.style.display='none';
                document.body.appendChild(indicateDestinationBox);
            }
            contentToBeDragged = false;
            return;
        }
        if(contentToBeDragged_next){
            contentToBeDragged_src.insertBefore(contentToBeDragged,contentToBeDragged_next);
        }else{
            contentToBeDragged_src.appendChild(contentToBeDragged);
        }
    }
    contentToBeDragged = false;
    dragDropIndicator.style.display='none';
    if(indicateDestinationBox){
        indicateDestinationBox.style.display='none';
        document.body.appendChild(indicateDestinationBox);

    }
    mouseoverObj = false;

}

/*
 Preparando dados a serem salvos
 */
function saveDragDropNodes()
{
    var saveString = "";
    var uls = dragDropTopContainer.getElementsByTagName('UL');
    for(var no=0;no<uls.length;no++){	// LOoping through all <ul>
        var lis = uls[no].getElementsByTagName('LI');
        for(var no2=0;no2<lis.length;no2++){
            if(saveString.length>0)saveString = saveString + ";";
            saveString = saveString + uls[no].id + '|' + lis[no2].id;
        }
    }

    document.getElementById('saveContent').innerHTML = '<h1>Ready to save these nodes:</h1> ' + saveString.replace(/;/g,';<br>') + '<p>Format: ID of ul |(pipe) ID of li;(semicolon)</p><p>Você pode colocar esses valores em um campo de formulário oculto, postá-lo para o servidor e explodir o valor  não apresentado</p>';

}

function initDragDropScript()
{
    dragContentObj = document.getElementById('dragContent');
    dragDropIndicator = document.getElementById('dragDropIndicator');
    dragDropTopContainer = document.getElementById('dhtmlgoodies_dragDropContainer');
    document.documentElement.onselectstart = cancelEvent;;
    var listItems = dragDropTopContainer.getElementsByTagName('LI');	// Obter array contendo todos <LI>
    var itemHeight = false;
    for(var no=0;no<listItems.length;no++){
        listItems[no].onmousedown = initDrag;
        listItems[no].onselectstart = cancelEvent;
        if(!itemHeight)itemHeight = listItems[no].offsetHeight;
        if(MSIE && navigatorVersion/1<6){
            listItems[no].style.cursor='hand';
        }
    }

    var mainContainer = document.getElementById('dhtmlgoodies_mainContainer');
    var uls = mainContainer.getElementsByTagName('UL');
    itemHeight = itemHeight + verticalSpaceBetweenListItems;
    for(var no=0;no<uls.length;no++){
        uls[no].style.height = itemHeight * boxSizeArray[no]  + 'px';
    }

    var leftContainer = document.getElementById('dhtmlgoodies_listOfItems');
    var itemBox = leftContainer.getElementsByTagName('UL')[0];

    document.documentElement.onmousemove = moveDragContent;	// Mouse movimento evento - que se deslocam div arrastável
    document.documentElement.onmouseup = dragDropEnd;	// Mouse movimento evento - que se deslocam div arrastável

    var ulArray = dragDropTopContainer.getElementsByTagName('UL');
    for(var no=0;no<ulArray.length;no++){
        ulPositionArray[no] = new Array();
        ulPositionArray[no]['left'] = getLeftPos(ulArray[no]);
        ulPositionArray[no]['top'] = getTopPos(ulArray[no]);
        ulPositionArray[no]['width'] = ulArray[no].offsetWidth;
        ulPositionArray[no]['height'] = ulArray[no].clientHeight;
        ulPositionArray[no]['obj'] = ulArray[no];
    }

    if(!indicateDestionationByUseOfArrow){
        indicateDestinationBox = document.createElement('LI');
        indicateDestinationBox.id = 'indicateDestination';
        indicateDestinationBox.style.display='none';
        document.body.appendChild(indicateDestinationBox);


    }
}

window.onload = initDragDropScript;/**
 * Created by ralphera on 04/10/2015.
 */

/**
 * Created by vadimushka_d on 014 - 14 апр.
 */

function select(id){
    const menu = document.getElementById('select_' + id).style;
    if (menu.display === 'none'){
        menu.display = 'block';
    } else {
        menu.display = 'none';
    }
}
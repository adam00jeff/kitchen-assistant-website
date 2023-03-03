window.onload = function () {

    document.addEventListener('change', e => {
        if (e.target.matches('button.destroy_stock')) {
            destroyStockByID(e.target.value);
        }
    });
}
async function destroyStockByID(id) {
    try {
        const response = await axios.delete('/stock/' + id);
        if (response.data.msg === 'success') {
            alert('Successfully Deleted');
            window.location = '/stock';
    }
    } catch (error) {
        console.error(error);
    }
}

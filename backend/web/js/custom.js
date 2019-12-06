//fa 选择图标
async function choice_fa(name) {
    const {value: formValues}= await swal.fire({
        title:'选择图标',
        html:'<?=$list?>',
        width:'500px',
        focusConfirm: false,
        preConfirm: () => {
            return $("input[name='radioname']:checked").val();
        }
    });
    if(formValues){
        document.getElementById(name).value=formValues;
    }
}


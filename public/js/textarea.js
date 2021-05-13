function flexTextarea(el) {
    const dummy = el.querySelector('.FlexTextarea__dummy')
    el.querySelector('.FlexTextarea__textarea').addEventListener('input', e => {
        dummy.textContent = e.target.value + '​'
    })
}
document.querySelectorAll('.FlexTextarea').forEach(flexTextarea)
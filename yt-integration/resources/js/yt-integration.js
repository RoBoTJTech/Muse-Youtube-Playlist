copyText = id => {
  let element = document.getElementById(id)
  element.focus()
  element.select()
  document.execCommand('copy')
}

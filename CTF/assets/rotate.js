const rot13 = sentence => {
  const convertFun = char => {
    const charcode = char.charCodeAt(0)
    const base = (charcode > 0x60)
      ? 0x61
      : 0x41

    return /[A-Za-z]/.test(char)
      ? (charcode - base + 13) % 26 + base
      : charcode
  }

  return String.fromCharCode(...Array.from(sentence, convertFun))
}

const rotN = n => sentence => {
  const _rotN = n => char => {
    const base = char === char.toUpperCase() ? 0x41 : 0x61 // Upper or Lower
    return String.fromCharCode((char.charCodeAt(0) - base + n) % 26 + base)
  }
  return sentence.replace(/[A-Za-z]/g, _rotN(n))
}

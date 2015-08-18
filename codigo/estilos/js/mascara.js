function formatar_mascara(src, mascara) {
	var campo = src.value.length;
	var saida = mascara.substring(1,2);
	var texto = mascara.substring(campo);
	if(texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
}
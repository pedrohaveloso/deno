// @ts-check

console.log("%cOlá, curioso.", "font-size: x-large");

console.log(
  "%cSe você estiver explorando e gostaria de saber mais sobre como este site funciona, sinta-se à vontade para nos contatar.",
  "font-size: large"
);

console.log(
  "%cPor favor, lembre-se de NÃO executar códigos aqui, pois isso pode comprometer a segurança do seu navegador.",
  "font-size: large"
);

document.querySelectorAll("[data-hook]")?.forEach(async (element) => {
  const hookName = element.getAttribute("data-hook");

  if (hookName === null) {
    return;
  }

  const hook = await import("./hooks/" + hookName + ".js");

  await hook.default(element);
});

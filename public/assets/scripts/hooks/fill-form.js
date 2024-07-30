// @ts-check

/**
 * Preenche todas as entradas de um {@link HTMLFormElement} [element] com os
 * valores fornecidos no atributo [data-fill-form] num formato JSON.
 *
 * @param {HTMLElement} element
 */
export default function (element) {
  if (element instanceof HTMLFormElement) {
    let values = element.getAttribute("data-fill-form");

    try {
      values = JSON.parse(values ?? "");
    } catch (_) {}

    if (values === null || typeof values !== "object") {
      return;
    }

    element.querySelectorAll("[name]")?.forEach((input) => {
      if (
        input instanceof HTMLInputElement ||
        input instanceof HTMLTextAreaElement ||
        input instanceof HTMLSelectElement
      ) {
        if (values[input.name] !== undefined) {
          input.value = values[input.name];
        }
      }
    });
  }

  element.removeAttribute("data-fill-form");
}

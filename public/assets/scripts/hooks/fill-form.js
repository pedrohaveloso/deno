// @ts-check

/**
 * @param {HTMLElement} element
 */
export default function (element) {
  if (element instanceof HTMLFormElement) {
    let values = element.getAttribute("data-hook-values");

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
}

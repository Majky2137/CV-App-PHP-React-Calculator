import { actions } from "./App"
export default function Operationbutton({ dispatch, operation }) {
  return (
    <button
      onClick={() =>
        dispatch({ type: actions.CHOOSE_OPERATION, payload: { operation } })
      }
    >
      {operation}
    </button>
  )
}
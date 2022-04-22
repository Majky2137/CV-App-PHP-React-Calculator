import { actions } from "./App"
export default function Digitbutton({ dispatch, digit }) {
  return (
    <button
      onClick={() => dispatch({ type: actions.ADD_DIGIT, payload: { digit } })}
    >
      {digit}
    </button>
  )
}
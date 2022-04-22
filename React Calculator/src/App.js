import { useReducer } from 'react'
import './styles.css'
import Digitbutton from './Digitbutton'
import Operationbutton from './Operationbutton'

export const actions= {
  ADD_DIGIT: "add-digit",
  CHOOSE_OPERATION: "choose-operation",
  CLEAR: "clear",
  DELETE_DIGIT:"delete-digit",
  EVALUATE:"evaluate",
}

function reducer(state, { type, payload }) {
  switch (type) {
    case actions.ADD_DIGIT:
      if (state.overwrite) {
        return {
          ...state,
          curroper: payload.digit,
          overwrite: false,
        }
      }
      if (payload.digit === "0" && state.curroper === "0") {
        return state
      }
      if (payload.digit === "." && state.curroper.includes(".")) {
        return state
      }

      return {
        ...state,
        curroper: `${state.curroper || ""}${payload.digit}`,
      }
    case actions.CHOOSE_OPERATION:
      if (state.curroper == null && state.prevoper == null) {
        return state
      }

      if (state.curroper == null) {
        return {
          ...state,
          operation: payload.operation,
        }
      }

      if (state.prevoper == null) {
        return {
          ...state,
          operation: payload.operation,
          prevoper: state.curroper,
          curroper: null,
        }
      }

      return {
        ...state,
        prevoper: evaluate(state),
        operation: payload.operation,
        curroper: null,
      }
    case actions.CLEAR:
      return {}
    case actions.DELETE_DIGIT:
      if (state.overwrite) {
        return {
          ...state,
          overwrite: false,
          curroper: null,
        }
      }
      if (state.curroper == null) return state
      if (state.curroper.length === 1) {
        return { ...state, curroper: null }
      }

      return {
        ...state,
        curroper: state.curroper.slice(0, -1),
      }
    case actions.EVALUATE:
      if (
        state.operation == null ||
        state.curroper == null ||
        state.prevoper == null
      ) {
        return state
      }

      return {
        ...state,
        overwrite: true,
        prevoper: null,
        operation: null,
        curroper: evaluate(state),
      }
  }
}

 function evaluate({ curroper, prevoper, operation }) {
  const prev = parseFloat(prevoper)
  const current = parseFloat(curroper)
  if (isNaN(prev) || isNaN(current)) return ""
  let computation = ""
  switch (operation) {
    case "+":
      computation = prev + current
      break
    case "-":
      computation = prev - current
      break
    case "*":
      computation = prev * current
      break
    case "÷":
      computation = prev / current
      break
  }

  return computation.toString()
}

const INTEGER_FORMATTER = new Intl.NumberFormat("en-us", {
  maximumFractionDigits: 0,
})

function formatOperand(operand) {
  if (operand == null) return
  const [integer, decimal] = operand.split(".")
  if (decimal == null) return INTEGER_FORMATTER.format(integer)
  return `${INTEGER_FORMATTER.format(integer)}.${decimal}`
}

function App() {
  const [{curroper, prevoper, operation}, dispatch] = useReducer(reducer, 
    {}
  )


  return (
    <div className="cal-grid">
        <div className="output">
          <div className="prev-operand">{formatOperand(prevoper)} {operation}</div>
          <div className="curr-operand">{formatOperand(curroper)}</div>
        </div>
        <button className="span-two" onClick={() => dispatch({ type: actions.CLEAR })}>AC</button>
        <button onClick={() => dispatch({ type: actions.DELETE_DIGIT })}>DEL</button>
        <Operationbutton operation="÷" dispatch={dispatch} />
        <Digitbutton digit="1" dispatch={dispatch} />
        <Digitbutton digit="2" dispatch={dispatch} />
        <Digitbutton digit="3" dispatch={dispatch} />
        <Operationbutton operation="*" dispatch={dispatch} />
        <Digitbutton digit="4" dispatch={dispatch} />
        <Digitbutton digit="5" dispatch={dispatch} />
        <Digitbutton digit="6" dispatch={dispatch} />
        <Operationbutton operation="+" dispatch={dispatch} />
        <Digitbutton digit="7" dispatch={dispatch} />
        <Digitbutton digit="8" dispatch={dispatch} />
        <Digitbutton digit="9" dispatch={dispatch} />
        <Operationbutton operation="-" dispatch={dispatch} />
        <Digitbutton digit="." dispatch={dispatch} />
        <Digitbutton digit="0" dispatch={dispatch} />
        <button className="span-two" onClick={() => dispatch({ type: actions.EVALUATE })}>=</button>
    </div>
  )
}

export default App;

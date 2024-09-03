import React, { Component } from 'react';
import '@highlightjs/cdn-assets/styles/default.min.css';

class HighLight extends Component {
    constructor(props) {
        super(props);
        // Initialiser l'état avec la valeur initiale provenant des props
        this.state = {
            text: props.value || ''  // Utilise la valeur des props ou une chaîne vide par défaut
        };
    }

    static defaultProps = {
        indentLength: 4
    };

    handleChange = (e) => {
        this.setState({ text: e.target.value });
        if (this.props.onChange) {
            this.props.onChange(e.target.value);
        }
    };

    handleKeyDown = (e) => {
        const { indentLength } = this.props;
        const indent = ' '.repeat(indentLength);

        if (e.key === 'Tab') {
            e.preventDefault();
            const { selectionStart, selectionEnd } = e.target;
            const newText = this.state.text.substring(0, selectionStart) + indent + this.state.text.substring(selectionEnd);

            this.setState({ text: newText }, () => {
                e.target.selectionStart = e.target.selectionEnd = selectionStart + indentLength;
            });
        } else if (e.key === 'Enter') {
            e.preventDefault();
            const { selectionStart } = e.target;
            const lineStart = this.state.text.lastIndexOf('\n', selectionStart - 1) + 1;
            const indentMatch = this.state.text.substring(lineStart, selectionStart).match(/^\s*/);
            const currentIndent = indentMatch ? indentMatch[0] : '';

            const newText = this.state.text.substring(0, selectionStart) + '\n' + currentIndent + this.state.text.substring(selectionStart);

            this.setState({ text: newText }, () => {
                e.target.selectionStart = e.target.selectionEnd = selectionStart + currentIndent.length + 1;
            });
        }
    };

    // Utilisation de componentDidUpdate pour détecter les changements dans les props
    componentDidUpdate(prevProps) {
        if (prevProps.value !== this.props.value) {
            this.setState({ text: this.props.value });
        }
    }

    render() {
        return (
            <textarea
                value={this.state.text}
                onChange={this.handleChange}
                onKeyDown={this.handleKeyDown}
                style={{ width: '100%', height: '200px', fontFamily: 'monospace', whiteSpace: 'pre' }}
            />
        );
    }
}

export default HighLight;

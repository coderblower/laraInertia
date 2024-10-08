import { forwardRef, useEffect, useImperativeHandle, useRef } from 'react';

export default forwardRef(function SelectInput(
    { className = '', isFocused = false, options = [], placeholder = 'Select an option', ...props },
    ref,
) {
    const input = useRef(null);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <select
            {...props}
            className={
                'rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ' +
                className
            }
            ref={input}
        >
            <option value="" disabled>{placeholder}</option>
            {options.map(option => (
                <option key={option} >
                    {option}
                </option>
            ))}
        </select>
    );
});
